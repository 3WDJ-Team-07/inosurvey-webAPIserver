<?php

namespace App\Http\Controllers\Surveies;
/**
 * 클래스명:                       SurveyController
 * @package                       App\Http\Controllers\Surveies
 * 클래스 설명:                    설문조사 요청 작업을 하는 컨트롤러
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1701037 김민영 1501107 박보근
 * 만든날:                        2019년 4월 10일
 *
 * 함수 목록
 * index()                      판매중인 설문조사 내용
 * create(설문정보)             설문 요청 시 작성한 정보를 해당 테이블에 저장
 * uploadImage(파일)            파일 업로드
 * deleteImage(파일)            파일 삭제
 * abort(설문아이디)            진행중인 설문을 강제 중단시키는 함수
 * 
 */

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ConstantEnum;
use App\Http\Controllers\Helpers\StoreImage;
use App\Http\Controllers\Helpers\Guzzles;

use App\Models\Surveies\Form;
use App\Models\Surveies\Question;
use App\Models\Surveies\QuestionItem;
use App\Models\Surveies\ReplyableUser;
use App\Models\Surveies\JobTarget;
use App\Models\Surveies\Target;
use App\Models\Users\job;
use App\Models\Users\User;


class SurveyController extends Controller {
    
    use StoreImage, Guzzles;

    private $formModel          = null;
    private $questionModel      = null;
    private $questionItemModel  = null;
    private $targetModel        = null;
    private $jobModel           = null;
    private $jobTargetModel     = null;
    private $replyableUserModel = null;
    private $userModel          = null;

    public function __construct() {
        $this->formModel            = new Form();
        $this->questionModel        = new Question();
        $this->questionItemModel    = new QuestionItem();
        $this->targetModel          = new Target();
        $this->jobModel             = new Job();
        $this->jobTargetModel       = new JobTarget();
        $this->replyableUserModel   = new ReplyableUser();
        $this->userModel            = new User();
    }

    //설문 작성
    public function create(Request $request){
       
        //설문 결제
        $payload = array( 
            'form_params' => [
                'user_id'       => $request->user_id,
                'maximumCount'  => $request->target['responseNumber'],
                'questionCount' => count($request->list),
                'startedAt'     => time(),
            ]
        );
        
        $response = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['payment']);
       
         //설문 요청 실패
        if($response['status'] != 200){
            return response()->json(['message'=>'Payment failed'],401);
        }
        
    
        $gender         = $request->target['gender'];
        $countAgeJob    = count($request->input('target.*.*'));
        $existJob       = false;

        //설문 타겟 설정 여부
        if($gender==0 && $countAgeJob==0){
            $targetIsActive = false;
        } else{
            $targetIsActive = true;
        } 
        
        //forms테이블 - create
        $formData = array([
            'title'                 => $request->survey_title,
            'description'           => $request->survey_description,
            'respondent_number'     => $request->target['responseNumber'],
            'target_isactive'       => $targetIsActive,
            'bgcolor'               => $request->bgcolor,
            'closed_at'             => $request->closed_at,
            'user_id'               => $request->user_id,
            'is_sale'               => $request->is_sale
        ]);

        $this->formModel->insertMsgs($formData);
        $formId = $this->formModel->getLatest('id')->id;


        //targets테이블 - 설문 타겟 true일 경우(age,gender,job이 해당)
        if($targetIsActive == true){
          
            $age        = $request->input('target.age','');
            $gender     = $gender;
            $this->targetModel->create(['age' => $age, 'gender' => $gender]);

            $targetId   = $this->targetModel->getLatest('id')->id;

            //target->job 타겟
            if($request->target['job']){

                $existJob = true;
                foreach ($request->target['job'] as $job){

                    //job_target테이블(피봇테이블) - 생성
                    $jobTargetData = array([
                        'job_id'            => $job,
                        'target_id'         => $targetId
                    ]);
                    $this->jobTargetModel->insertMsgs($jobTargetData);
                }
            }

            //forms테이블 - target_id(null -> $targetId) 변경
            $this->formModel->UpdateMsg($formId, 'target_id', $targetId);

            //replyable_user테이블 - 응답가능유저 저장
            $target = $request->target;
            $users  = $this->userModel->getReplyableUser($gender, $request->target, $targetId, $existJob)->get();

            foreach($users as $user){
                $replyableUserData = array([
                    'replyable_id'      => $user->id,
                    'survey_id'         => $formId
                ]);
                $this->replyableUserModel->insertMsgs($replyableUserData);
            }

        }else{
            //target이 없는 경우 
            //replyable_user테이블 모든 회원 추가
            $users = $this->userModel->get();
            foreach($users as $user){
                $replyableUserData = array([
                    'replyable_id'      => $user->id,
                    'survey_id'         => $formId
                ]);
                $this->replyableUserModel->insertMsgs($replyableUserData);
            }
        }//end of insert targets & update form


        //questions테이블 - create
        foreach ($request->list as $question){    
               
            $questionData = array([
                'question_number'       => $question['index'],
                'question_title'        => $question['question_title'],
                'image'                 => $question['question_image'],
                'form_id'               => $formId,
                'type_id'               => $question['type']
            ]); 
            
           $this->questionModel->insertMsgs($questionData);
            
            $questionId         = $this->questionModel->getLatest('id')->id;
            $questionType       = $this->questionModel->getLatest('id')->type_id;

            //question_items테이블 - 들어오는 순서에 맞게 item추가, 저장
            if($question['items']){
                    $contentNumber = 1;
                    foreach ($question['items'] as $item){
                        $itemData = array([
                            'content'               => $item['value'],
                            'content_number'        => $contentNumber,
                            'question_id'           => $questionId
                        ]);
                        $this->questionItemModel->insertMsgs($itemData);

                        $itemId = $this->questionItemModel->getLatest('id')->id;

                        //question_items테이블 - 이미지 선택 타입일 경우 image update
                        if($questionType == 6) $this->questionItemModel->updateImg($itemId, $item['image']);
                        
                        $contentNumber ++;
                    }
            }//end of questionItem
        }//end of question foreach loop

        return response()->json(['message'=>'true'],201);
    }



    //이미지 등록
    public function uploadImage(Request $request){

        $file = $this->fileUpload($request,ConstantEnum::S3['surveies']);
        
        if($file == false){
            return response()->json(['message'=>'false'],400);
        }
        
        return $file;
    }//end of uploadImage


    //이미지 등록 취소
    public function deleteImage(Request $request){

        return $this->fileDelete($request);
 
    }

    //설문 중단
    public function abort(Request $request){
        
        $this->formModel->where('id',$request->id)->update(['is_completed' => 1]);

        return response()->json(['message'=>'true'],200);
    }

}
