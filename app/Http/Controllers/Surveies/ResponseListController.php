<?php

namespace App\Http\Controllers\Surveies;
/**
 * 클래스명:                       ResponseListController
 * @package                       App\Http\Controllers\Surveies
 * 클래스 설명:                    기부 관련 리스트를 조회하는 클래스
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                        2019년 5월 1일
 *
 * 함수 목록
 * getForm() :                      응답 가능설문 리스트 조회
 * selectQuestionItem() : 
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Surveies\Form;
use App\Models\Surveies\Question;
use App\Models\Users\User;

class ResponseListController extends Controller
{
    
    private $formModel          = null;
    private $questionModel      = null;
    private $userModel          = null;

    public function __construct() {
        $this->formModel        = new Form();
        $this->questionModel    = new Question();
        $this->userModel        = new User(); 
    }


     //설문 리스트 
     public function getForm(Request $request){
        $userId             = $request->user_id;
        $trappedForms       = $this->userModel->getTrappedForm($userId);
        $replyableForms     = $this->formModel->getReplyableForm($trappedForms, $userId)->get();

        return response()->json(['message' => 'true','form' => $replyableForms],200);
    }
   
    //설문조사 아이템, 질문 내용 select
    public function selectQuestionItem(Request $request){
        $questionItem   = $this->questionModel->selectItems($request->id);
        return response()->json(['message' => 'true', 'questionItem' => $questionItem],200);

    }
}
