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
 * analysis(설문조사 정보)      :   설문조사의 질문 당 응답 결과 분석
 * targetAnalysis(질문 정보)    :   응답자 필터링 한 설문조사 분석 질문 결과
 * 
 */ 

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Users\User;
use App\Models\Users\Job;
use App\Models\Surveies\Form;
use App\Models\Surveies\SurveyUser;
use App\Models\Surveies\Question;
use App\Models\Surveies\ItemResponse;
use App\Models\Surveies\Response;

class AnalysisController extends Controller
{
    private $userModel          = null;
    private $jobModel           = null;
    private $formModel          = null;
    private $questionModel      = null;
    private $itemResponseModel  = null;
    private $responseModel      = null;
    private $surveyUserModel    = null;

    public function __construct() {
        $this->userModel            = new User();
        $this->jobModel             = new Job();
        $this->surveyUserModel      = new SurveyUser();
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
        

        if($formData->target == null){                                                      //타겟이 없을 경우 

            $jobArray      = $this->jobModel->all();
            $gender        = 0;
            $ageArray      = array(10,20,30,40,50,60,70,80,90,100);

            $formData = collect($formData);

            $allTarget = array(

                'job'       => $jobArray,
                'gender'    => $gender,
                'age'       => $ageArray
            
            );
          
            $formData->put('target', $allTarget);
           
        }else if($formData->target != null && $formData->target['job']->count() == 0) {     //직업 타겟이 없을 경우 
    
            $jobList = $this->jobModel->all();

            foreach($jobList as $item){
                
                $formData->target['job']->push($item);
            
            }
          
        }else if($formData->target != null &&$formData->target['age'] == null){                 //나이 타겟이 없을 경우
            
            $ageArray = array(10,20,30,40,50,60,70,80,90,100);
            
            $formData->target['age'] = $ageArray;
        
        }                                                                                  
              
        
        $targetPercentageArray  = array();
        $targetArray            = array("age","gender","job");
        $responseData           = $this->formModel->where('id',$formId)->first()->respondentUsers;
        $allResponsesCount      = $responseData->count();

        if($allResponsesCount == 0){
            $allResponsesCount = 1;
        } 

        foreach($targetArray as $key){
            $insertableArray        = array();
            switch($key){
                case "age": 
                    for($age=10; $age<=100; $age=$age+10){
                        $ageCount   = $responseData->where('age',$age)->count();
                        $ageCount   = (double)sprintf("%2.2f",($ageCount / $allResponsesCount) * 100);
                        array_push($insertableArray,$ageCount);
                    }
                    break;
                case "gender":  
                    $maleCount      = $responseData->where('gender',1)->count();
                    $femaleCount    = $responseData->where('gender',2)->count();
                    $maleCount      = (double)sprintf("%2.2f",($maleCount / $allResponsesCount) * 100);
                    $femaleCount    = (double)sprintf("%2.2f",($femaleCount / $allResponsesCount) * 100);
                    array_push($insertableArray,$maleCount,$femaleCount);
                    break;
                case "job":
                    for($job=1; $job<10; $job++){
                        $jobCount   = $responseData->where('job_id',$job)->count();
                        $jobName    = $this->jobModel->where('id',$job)->pluck('name')->first();
                        $jobCount   = (double)sprintf("%2.2f",($jobCount / $allResponsesCount) * 100);
                        array_push($insertableArray,$jobCount);
                    }
                    break;
                default;
            };
            array_push($targetPercentageArray,[$key => $insertableArray]);
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

            if($allResponsesCount == 0){
                $allResponsesCount = 1;
            } 

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

                    if($questionType == 6){

                        $itemValue = $question->questionItems->pluck('content_number')->toArray();
                    
                    } 
                    
                    foreach($itemData as $item){
                        $itemId             = $item->id;
                        $itemResponseCount  = $this->itemResponseModel->where('item_id',$itemId)->count();

                        $responseCountResult = (double)sprintf("%2.2f",($itemResponseCount / $allResponsesCount) * 100);   //응답 아이템 백분율 결과,소수점 두자리까지 표현 
                        
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
        $responsesArray     = $this->surveyUserModel->whereIn('respondent_id',$userArray)->pluck('id')->toArray();
        $responseIdArray    = $this->responseModel->where('question_id',$questionId)
                                                  ->whereIn('response_id',$responsesArray)
                                                  ->pluck('id')
                                                  ->toArray();

        $questionType       = $question->type_id;
        
        $responseValue      = $this->responseModel->whereIn('id',$responseIdArray)->pluck('question_text');
        $allResponsesCount  = $question->responses->count();

        if($allResponsesCount == 0){

            $allResponsesCount = 1;
        
        } 
        

        if($questionType!=2 && $questionType!=5){
            //객관식 - 아이템당 응답자 수를 array로 전달
            $itemData           = $question->questionItems;
            
            if($questionType == 6){
                $itemArray = $question->questionItems->toArray();
            }else{
                $itemArray  = $question->questionItems->pluck('content')->toArray();
            } 
            foreach($itemData as $item){
                $itemId             = $item->id;
                $itemResponseCount  = $this->itemResponseModel->where('item_id',$itemId)
                                                              ->whereIn('response_id',$responseIdArray)
                                                              ->count();

                $responseCountResult = (double)sprintf("%2.2f",($itemResponseCount / $allResponsesCount) * 100);
                
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
            'message'           => 'true', 
            'responseArray'     => $responseArray, 
            'itemArray'         => $itemArray,
            'allResponsesCount' => $allResponsesCount],
             200);
    }//end of targetAnalysis()
}
