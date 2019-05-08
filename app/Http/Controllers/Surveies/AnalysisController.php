<?php

namespace App\Http\Controllers\Surveies;
/**
 * 클래스명:                      ResponseController
 * @package                      App\Http\Controllers\Surveies
 * 클래스 설명:                   설문조사 분석 작업을 하는 컨트롤러
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1701037 김민영 1501107 박보근
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
   
        $questionResponseArray  = array();
        $formId                 = $request->form_id;
        $formQuestion           = $this->questionModel->where('form_id',$formId);
        $questions              = $formQuestion->get();
        $formData               = $this->formModel->where('id',$formId)->with('target.job')->first();
        // $allResponseRate        = sprintf("%2.2f",($formData->pluck('respondent_count')->first() / $formData->pluck('respondent_number')->first())* 100);  //설문 응답률

        $targetPercentageArray  = array();
        $targetArray            = array("age","gender","job");
        $responseData           = $this->formModel->where('id',$formId)->first()->respondentUsers;
        $allResponsesCount      = $responseData->count();
        if($allResponsesCount == 0) $allResponsesCount = 1;

        foreach($targetArray as $key){
            $insertableArray        = array();
            switch($key){
                case "age": 
                    $ageArray   = array();
                    for($age=10; $age<=100; $age=$age+10){
                        $ageCount   = $responseData->where('age',$age)->count();
                        if($ageCount > 0){
                            $ageCount   = sprintf("%2.2f",($ageCount / $allResponsesCount) * 100);
                            array_push($ageArray,[
                                "age"           => $age,
                                "percentage"    => $ageCount
                                ]);
                        }
                    }
                    array_push($insertableArray,$ageArray);
                    break;
                case "gender":  
                    $maleCount      = $responseData->where('gender',1)->count();
                    $femaleCount    = $responseData->where('gender',2)->count();
                    $maleCount      = sprintf("%2.2f",($maleCount / $allResponsesCount) * 100);
                    $femaleCount    = sprintf("%2.2f",($femaleCount / $allResponsesCount) * 100);
                    array_push($insertableArray,$maleCount,$femaleCount);
                    break;
                case "job":
                    $jobArray   = array();
                    for($job=1; $job<10; $job++){
                        $jobCount   = $responseData->where('job_id',$job)->count();
                        if($jobCount > 0){
                            $jobCount   = sprintf("%2.2f",($jobCount / $allResponsesCount) * 100);
                            array_push($jobArray,[
                                "job"           => $job,
                                "percentage"    => $jobCount]);
                        }
                    }
                    array_push($insertableArray,$jobArray);
                    break;
                default;
            };
            if($key != "id") array_push($targetPercentageArray,[$key => $insertableArray]);
        }
        $formDataArray = array();
        array_push($formDataArray, ["formData"=>$formData]);
        array_push($formDataArray, ["percentage" => $targetPercentageArray]);
        

        //한 질문 당 응답자 수와 아이템당 응답자 수 count
        foreach($questions as $question){
            $responseArray          = array();
            $responseItemArray      = array();
            $resultArray            = array();
            $responseCountArray     = array();
            $questionType           = $question->type_id;
            $itemData               = $question->questionItems;
            $allResponsesCount      = $question->responses->count();

            if($allResponsesCount == 0) $allResponsesCount = 1;
            array_push($resultArray, $question->toArray());
            
            
            switch ($questionType){
                case 2:
                case 5:
                //주관식 - 답한 내용을 array로 전달
                    $responseValue = $question->responses->pluck('question_text');
                    array_push($resultArray, ["responseArray" => $responseValue]);
                    break;
                case 1:
                case 3:
                case 4: 
                case 6: 
                //객관식 - 아이템당 응답자 수를 array로 전달
                    $itemValue  = $question->questionItems->pluck('content')->toArray();
                    if($questionType == 6) $itemValue = $question->questionItems->pluck('content_number')->toArray();
                    
                    foreach($itemData as $item){
                        $itemId             = $item->id;
                        $itemResponseCount  = $this->itemResponseModel->where('item_id',$itemId)->count();

                        $responseCountResult = sprintf("%2.2f",($itemResponseCount / $allResponsesCount) * 100);   //응답 아이템 백분율 결과,소수점 두자리까지 표현 
                        
                        array_push($responseCountArray, [
                                'itemTitle' => $item->content ,
                                'percentage'=> $responseCountResult,
                            ]); 

                        array_push($responseItemArray,$itemResponseCount);
                    
                    }
                    
                    array_push($resultArray, ["itemArray"       => $itemValue]);
                    array_push($resultArray, ["responseArray"   => $responseItemArray]);
                    array_push($resultArray, ["responseResult"  => $responseCountArray]);

                    break;
                }                

            array_push($questionResponseArray,$resultArray);
            // array_push($questionResponseArray,$allResponseRate);
        }
        return response()->json([
            'message' => 'true',
            'form' => $formDataArray,
            'question' => $questionResponseArray],
             200);
    }//end of analysis()

    public function targetAnalysis(Request $request){
        $itemArray          = array();
        $responseArray      = array();
        $responseItemArray  = array();
        $responseCountArray = array();

        $questionId         = $request->question_id;
        $gender             = $request->input('target.gender',0);
        $age                = $request->input('target.age',0);
        $job                = $request->input('target.job',0);
        $question           = $this->questionModel->where('id',$questionId)->with('questionItems')->first();
        
        //필터링 된 유저
        //유저가 있는 responses의 array를 구함
        $userArray          = $this->userModel->getTrappedUser($gender,$age,$job)->pluck('id')->toArray();
        $responseIdArray    = $this->responseModel->where('question_id',$questionId)
                                                  ->whereIn('response_id',$userArray)
                                                  ->pluck('id')
                                                  ->toArray();

        $questionType       = $question->type_id;
        $itemData           = $question->questionItems;
        $itemArray          = $question->questionItems->pluck('content')->toArray();
        $responseValue      = $question->responses->whereIn('response_id',$userArray)->pluck('question_text');
        $allResponsesCount  = $question->responses->count();
        
        if($questionType == 6) $itemArray = $question->questionItems->toArray();

        if($questionType!=2 && $questionType!=4){
            //객관식 - 아이템당 응답자 수를 array로 전달
            foreach($itemData as $item){
                $itemId             = $item->id;
                $itemResponseCount  = $this->itemResponseModel->where('item_id',$itemId)
                                                              ->whereIn('response_id',$responseIdArray)
                                                              ->count();

                $responseCountResult = sprintf("%2.2f",($itemResponseCount / $allResponsesCount) * 100);
                
                array_push($responseCountArray, [
                    'itemTitle' => $item->content,
                    'percentage'=> $responseCountResult
                    ]);

                array_push($responseItemArray,$itemResponseCount);
            }
            array_push($responseArray,[$responseItemArray]);
            array_push($responseArray,$responseCountArray);
        }else{
            //주관식 - 아이템당 응답자 수를 array로 전달
            array_push($responseArray,$responseValue);
        }
    
            
        return response()->json([
            'message' => 'true', 
            'responseArray' => $responseArray, 
            'itemArray' => $itemArray,
            'allResponsesCount' => $allResponsesCount],
             200);
    }//end of targetAnalysis()
}
