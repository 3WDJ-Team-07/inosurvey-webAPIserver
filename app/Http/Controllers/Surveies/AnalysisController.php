<?php

namespace App\Http\Controllers\Surveies;
/**
 * 클래스명:                      ResponseController
 * @package                      App\Http\Controllers\Surveies
 * 클래스 설명:                   설문조사 분석 작업을 하는 컨트롤러
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1701037 김민영
 * 만든날:                        2019년 5월 01일
 *
 * 함수 목록
 * analysis(설문조사 정보)        설문조사의 질문 당 응답 결과 분석
 * targetAnalysis(질문 정보)      응답자 필터링 한 설문조사 분석 질문 결과
 * 
 */ 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Users\User;
use App\Models\Surveies\Form;
use App\Models\Surveies\Question;
use App\Models\Surveies\ItemResponse;
use App\Models\Surveies\Response;

class AnalysisController extends Controller
{
    private $userModel          = null;
    private $formModel          = null;
    private $questionModel      = null;
    private $itemResponseModel  = null;
    private $responseModel      = null;

    public function __construct() {
        $this->userModel            = new User();
        $this->formModel            = new Form();
        $this->questionModel        = new Question();
        $this->itemResponseModel    = new ItemResponse();
        $this->responseModel        = new Response();
    }

    public function analysis(Request $request){
        $itemArray      = array();
        $responseArray  = array();

        $formId         = $request->form_id;
        $formQuestion   = $this->questionModel->where('form_id',$formId);
        $questions      = $formQuestion->get();
        $formData       = $this->formModel->where('id',$formId)->with('target.job')->get();

        foreach($questions as $question){
            $questionType       = $question->type_id;
            $itemData           = $question->questionItems;
            $itemValue          = $question->questionItems->pluck('content')->toArray();
            $responseValue      = $question->responses->pluck('question_text');
            $responseItemArray  = array();
            if($questionType!=2 && $questionType!=6){
                //객관식
                foreach($itemData as $item){
                    $itemId             = $item->id;
                    $itemResponseCount  = $this->itemResponseModel->where('item_id',$itemId)->count();
                    array_push($responseItemArray,$itemResponseCount);
                }
                array_push($responseArray,$responseItemArray);
            }else{
                array_push($responseArray,$responseValue);
            }
            array_push($itemArray,$itemValue);
        }

        return response()->json(['message' => 'true', 'form' => $formData, 'question' => $formQuestion->get(), 'responseArray' => $responseArray, 'itemArray' => $itemArray], 200);
    }

    public function targetAnalysis(Request $request){
        $itemArray          = array();
        $responseArray      = array();
        $responseItemArray  = array();

        $questionId         = $request->question_id;
        $gender             = $request->input('target.gender',0);
        $age                = $request->input('target.age',0);
        $job                = $request->input('target.job',0);
///이부분 절대 안돼 안 돼 시바 ㅍ ㅇ란미 아 ㅓㄹ// 이제 된다 !! ^^
         $question          = $this->questionModel->where('id',$questionId)->with('questionItems')->first();

        //필터링 된 유저
        //유저가 있는 responses의 array를 구해야함
        $userArray          = $this->userModel->getTrappedUser($gender,$age,$job)->pluck('id')->toArray();
        $responseIdArray    = $this->responseModel->where('question_id',$questionId)->whereIn('response_id',$userArray)->pluck('id')->toArray();

        $questionType       = $question->type_id;
        $itemData           = $question->questionItems;
        $itemArray          = $question->questionItems->pluck('content')->toArray();
        $responseValue      = $question->responses->whereIn('response_id',$userArray)->pluck('question_text');
        

        if($questionType!=2 && $questionType!=6){
            //객관식
            foreach($itemData as $item){
                $itemId             = $item->id;
                $itemResponseCount  = $this->itemResponseModel->where('item_id',$itemId)->whereIn('response_id',$responseIdArray)->count();
                array_push($responseItemArray,$itemResponseCount);
            }
            array_push($responseArray,$responseItemArray);
        }else{
            //주관식
            array_push($responseArray,$responseValue);
        }
            
        return response()->json(['message' => 'true', 'responseArray' => $responseArray, 'itemArray' => $itemArray], 200);
    }
}
