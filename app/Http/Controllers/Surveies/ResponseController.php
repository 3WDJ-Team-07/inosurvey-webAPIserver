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
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Surveies\Form;
use App\Models\Surveies\Question;
use App\Models\Surveies\QuestionItem;
use App\Models\Surveies\ItemResponse;
use App\Models\Surveies\SurveyUser;
use App\Models\Surveies\Response;
use App\Models\Users\User;

class ResponseController extends Controller
{ 
   
    private $formModel          = null;
    private $questionModel      = null;
    private $questionItemModel  = null;
    private $userModel = null;

    public function __construct() {
        $this->formModel            = new Form();
        $this->questionModel        = new Question();
        $this->questionItemModel    = new QuestionItem();
        $this->userModel           = new User();
    }

    //응답 내용 저장
    public function create(Request $request){
        return $request;
    }
    
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
