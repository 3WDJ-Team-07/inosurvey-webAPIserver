<?php

namespace App\Http\Controllers\Surveys;
/**
 * 클래스명:                      ResponseController
 * @package                      App\Http\Controllers\Surveys
 * 클래스 설명:                   설문조사 응답 작업을 하는 컨트롤러
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근 1701037 김민영 
 * 만든날:                        2019년 4월 10일
 *
 * 함수 목록
 * getForm(유저정보)            :    유저가 응답할 수 있는 설문조사 내용
 * response(응답정보)           :    설문 응답 시 작성한 정보를 해당 테이블에 저장
 * selectQuestionItem(파일)     :    파일 업로드
 * 
 */
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ConstantEnum;
use App\Http\Controllers\Helpers\Guzzles;
use Carbon\Carbon;

use App\Models\Surveys\Form;
use App\Models\Surveys\Question;
use App\Models\Surveys\QuestionItem;
use App\Models\Surveys\ItemResponse;
use App\Models\Surveys\SurveyUser;
use App\Models\Surveys\Response;
use App\Models\Users\User;

class ResponseController extends Controller
{ 
    
    use Guzzles;

    private $formModel          = null;
    private $questionModel      = null;
    private $questionItemModel  = null;
    private $itemResponseModel  = null;
    private $surveyUserModel    = null;
    private $responseModel      = null;
    private $userModel          = null;

    public function __construct() {
        $this->formModel            = new Form();
        $this->questionModel        = new Question();
        $this->questionItemModel    = new QuestionItem();
        $this->itemResponseModel    = new ItemResponse();
        $this->surveyUserModel      = new SurveyUser();
        $this->responseModel        = new Response();
        $this->userModel            = new User(); 
    }

    //응답 내용 저장
    public function response(Request $request){
        $data = json_decode($request->data, true);

        $survey = $this->formModel->where('id', $data["form_id"])->first();
        //설문 완료 및 설문 마감 검증
        $now = Carbon::now()->format('Y-m-d H:i:s');    //현재시간
        $closedAt = $survey->closed_at;                 //설문 마감시간


        //설문 완료 여부 검증 
        if($survey->respondent_count >= $survey->respondent_number || strtotime($now) >= strtotime($closedAt)){
            return response()->json(['message'=>'This is a closed survey.'], 202);
        }

        $surveyUserData = array(
            'survey_id'         =>  $data["form_id"],
            'respondent_id'     =>  $data["user_id"],
        );
        
        $respondent = $this->surveyUserModel->create($surveyUserData);      //설문 응답자 리스트에 추가

        //전부 응답 된 데이터인지 확인
        if($data["responsive_bool"]==false){
            return response()->json(['message'=>'You can not response this survey.']);
        }

        foreach ($data["question"] as $responseItem){
            $rs = $this->questionModel->where('form_id',  $data["form_id"])
                        ->where('id', $responseItem['question_id'])
                        ->first();
       
            switch ($rs->type_id) {
                //해당 질문이 객관식일 경우
                case 1:
                case 4:
                case 6:
                  
                    $responseData = array(
                        'question_id'            => $rs->id,
                        'response_id'            => $respondent->id,
                    );

                    $response = $this->responseModel->create($responseData);

                    $itemNumber = $this->questionItemModel->where('question_id', $rs->id)
                            ->where('content_number', (int)$responseItem['item'])
                            ->first();
            
                    $itemResponseData = array(
                        'response_id'        => $response->id,
                        'item_id'            => $itemNumber->id,
                    );
                
                    $this->itemResponseModel->create($itemResponseData);
                    break;
                //해당 질문이 주관식일 경우
                case 2:
                case 5:
                
                    //response테이블 데이터
                    $responseData = array(
                        'question_id'            => $rs->id,
                        'response_id'            => $respondent->id,
                        'question_text'          => $responseItem['item'],
                    );

                    $response = $this->responseModel->create($responseData); 
                    break;

                //해당 질문이 복수형일 경우 
                case 3:
               
                    //문자열을 배열로 변환
                    $items  = json_decode($responseItem['item'], true);
                      
                    foreach($items as $value){
                        $responseData = array(
                            'question_id'            => $rs->id,
                            'response_id'            => $respondent->id,
                        );
    
                        $response = $this->responseModel->create($responseData);
    
                        $itemNumber = $this->questionItemModel->where('question_id',$rs->id)
                            ->where('content_number', (int)$value)
                            ->first();
                
                        $itemResponseData = array(
                            'response_id'        => $response->id,
                            'item_id'            => $itemNumber->id,
                        );
                    
                        $this->itemResponseModel->create($itemResponseData);
                    }
                    
                default:
                    break;
            }
        }//end of foreach

        //설문 응답시 응답 횟수를 증가 
        $this->formModel->where('id', $data["form_id"])->increment('respondent_count');

        // $survey = $this->formModel->where('id', $data["form_id"])->first();
        
        //목표 응답수를 달성시 설문마감
        if($survey->respondent_number == $survey->respondent_count){
            $this->formModel->where('id', $data["form_id"])->update(['is_completed' => 1]);
        }


        //유저 응답 보상 지급 
        $payload = array( 
            'form_params' => [
                'user_id'   =>  $data["user_id"],
                'survey_id' =>  $data["form_id"],
            ]
        );
        
        $rewardRes = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['reward']);
         
        //요청 실패
         if($rewardRes['status'] != 200){
            return response()->json(['message'=>'Failure to pay compensation'], 401);
        }

       return response()->json(['message' => 'true'], 200);
    }//end of response

}
