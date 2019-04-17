<?php

namespace App\Http\Controllers\Surveies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\GuzzleController;

use App\Models\Surveies\Form;
use App\Models\Surveies\Question;
use App\Models\Surveies\QuestionItem;
use App\Models\Surveies\QuestionBank;
use App\Models\Surveies\JobTarget;
use App\Models\Surveies\Target;
use App\Models\Users\job;

class SurveyController extends Controller {
    
    private $formModel          = null;
    private $questionModel      = null;
    private $questionItemModel  = null;
    private $targetModel        = null;
    private $jobModel           = null;
    private $jobTargetModel           = null;

    public function __construct() {
        $this->formModel            = new Form();
        $this->questionModel        = new Question();
        $this->questionItemModel    = new QuestionItem();
        $this->targetModel          = new Target();
        $this->jobModel             = new Job();
        $this->jobTargetModel       = new JobTarget();
    }

    //설문 작성
    public function create(Request $request){
        
        $gender         = $request->input('target.gender');
        $responseNumber = $request->input('target.responseNumber');
        $countAgeJob    = count($request->input('target.*.*'));
        
        if($gender==0 && $countAgeJob==0) $targetIsActive = false;
        else $targetIsActive = true;
        
        $formData = array([
            'title'                 => $request->survey_title,
            'description'           => $request->survey_description,
            'respondent_number'     => $request->target['responseNumber'],
            'target_isactive'       => $targetIsActive,
            'bgcolor'               => $request->bgcolor,
            'closed_at'             => $request->closed_at.' 00:00:00'
        ]);
        //$this->formModel->insertMsgs($formData);
        //응답수는 무조건 설정해야하는걸로 

        $formId = $this->formModel->getLatest('started_at')->id;
        if($targetIsActive == true){
            $targetData = array([
                'age'           => $request->target['age'],
                'gender'        => $request->target['gender']
            ]);
        }
        $this->targetModel->insertMsgs($targetData);

        
        foreach ($request->list as $question){
        
            $questionData = array([
                'question_number'       => $question['index'],
                'question_title'        => $question['question_title'],
                'image'                 => $question['question_image'],
                //question_bank 묻기
                'form_id'               => $formId,
                'type_id'               => $question['type']
            ]); 
            //$this->questionModel->insertMsgs($questionData);
            
            $latestQuestion     = $this->questionModel->getLatest('id');
            $questionId         = $latestQuestion->id;
            $questionType       = $latestQuestion->type;

            $contentNumber = 1;
            
            return count($question['items']);
            foreach ($question['items'] as $item){
                $itemData = array([
                    'content'               => $item['value'],
                    'content_number'        => $contentNumber,
                    'question_id'           => $questionId
                ]);
                //$this->questionItemModel->insertMsgs($itemData);
                $contentNumber ++;
            }
            //user_id묻기 target_id update
        }

        return response()->json(['message'=>'true'],200);
    }
    
    //질문 은행
    public function questionBank(){
        if(Questionbank::all()) {
            return Questionbank::all();
        }else {
            return response()->json(['message'=>'false'],400);
        }
    }


}
