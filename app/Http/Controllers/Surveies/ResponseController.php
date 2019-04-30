<?php

namespace App\Http\Controllers\Surveies;
/**
 * 클래스명:                      ResponseController
 * @package                      App\Http\Controllers\Surveies
 * 클래스 설명:                   설문조사 응답 작업을 하는 컨트롤러
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1701037 김민영 1501107 박보근
 * 만든날:                        2019년 4월 10일
 *
 * 함수 목록
 * getForm(유저정보)            유저가 응답할 수 있는 설문조사 내용
 * create(응답정보)             설문 응답 시 작성한 정보를 해당 테이블에 저장
 * selectQuestionItem(파일)     파일 업로드
 * 
 */
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ConstantEnum;
use App\Http\Controllers\Helpers\Guzzles;

use App\Models\Surveies\Form;
use App\Models\Surveies\Question;
use App\Models\Surveies\QuestionItem;
use App\Models\Surveies\ItemResponse;
use App\Models\Surveies\SurveyUser;
use App\Models\Surveies\Response;
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

        $surveyUserData = array(
            'survey_id'         =>  $data["form_id"],
            'respondent_id'     =>  $data["user_id"],
        );
        
        $respondent = $this->surveyUserModel->create($surveyUserData);

        foreach ($data["question"] as $responseItem){
            $rs = $this->questionModel->where('form_id',  $data["form_id"])
                        ->where('id', $responseItem['question_id'])
                        ->first();
       
            switch ($rs->type_id) {
                  //해당 질문이 객관식일 경우
                case 1:
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
                case 4:
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

        $survey = $this->formModel->where('id', $data["form_id"])->first();
        
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
        
        $response = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['reward']);
         
        //요청 실패
         if($response['status'] != 200){
            return response()->json(['message'=>'Failure to pay compensation'], 401);
        }

       return response()->json(['message' => 'true'], 200);
    }//end of response

    
    //설문 리스트 
    public function getForm(Request $request){
        $userId = $request->user_id;
        $form = $this->userModel->getReplyableForm($userId);
    
        return response()->json(['message' => 'true','form' => $form],200);
    }
   
    //설문조사 아이템, 질문 내용 select
    public function selectQuestionItem(Request $request){

        $questionItem   = $this->questionModel->selectItems($request->id);
        
        return response()->json(['message' => 'true','questionItem' => $questionItem],200);
    }
}
