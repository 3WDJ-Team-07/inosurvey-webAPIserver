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
 * analysis(설문조사 정보)        설문조사의 질문 당 응답 결과
 * 
 */ 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Surveies\Form;
use App\Models\Surveies\Question;
use App\Models\Surveies\ItemResponse;

class AnalysisController extends Controller
{
    private $formModel          = null;
    private $questionModel      = null;
    private $itemResponseModel  = null;

    public function __construct() {
        $this->formModel            = new Form();
        $this->questionModel        = new Question();
        $this->itemResponseModel    = new ItemResponse();
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

        // $questions = $formQuestion->with(['questionItems' => function ($query){
        //     $query->with(['responses' => function($query){
        //         if($query->select('question_text')){
        //             //주관식인 경우
        //             $query->select('question_text');
        //         }else{
        //             //객관식인 경우
        //             $query->withCount('itemResponses');
        //             // array_push($itemArray,$itemResponses);
        //        }
        //     }]);
        // }])->get();


        // return $itemArray;
        return response()->json(['message' => 'true', 'form' => $formData, 'question' => $formQuestion->get(), 'responseArray' => $responseArray, 'itemArray' => $itemArray], 200);
    }

    public function targetAnalysis(Request $request){
        
    }
}
