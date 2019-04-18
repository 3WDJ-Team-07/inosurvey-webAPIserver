<?php

namespace App\Http\Controllers\Surveies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Helpers\StoreImage;
use App\Http\Controllers\Helpers\ConstantEnum;

use App\Http\Controllers\Helpers\GuzzleController;


use App\Models\Surveies\Form;
use App\Models\Surveies\Question;
use App\Models\Surveies\QuestionItem;
use App\Models\Surveies\QuestionBank;
use App\Models\Surveies\JobTarget;
use App\Models\Surveies\Target;
use App\Models\Users\job;


class SurveyController extends Controller {
    
    use StoreImage;

    private $formModel          = null;
    private $questionModel      = null;
    private $questionItemModel  = null;
    private $targetModel        = null;
    private $jobModel           = null;
    private $jobTargetModel     = null;

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
            'closed_at'             => $request->closed_at.' 00:00:00',
            'user_id'               => Auth::id()
        ]);
        //$this->formModel->insertMsgs($formData);
        $formId = $this->formModel->getLatest('started_at')->id;

        if($targetIsActive == true){
                $targetData = array([
                    'age'           => $request->input('target.age',''),
                    'gender'        => $request->input('target.gender','')
                ]);
            //$this->targetModel->insertMsgs($targetData);
            $targetId = $this->targetModel->getLatest('id')->id;

            if( $request->target['job']){
                foreach ($requesst->target['job'] as $job){
                    $jobTargetData = array([
                        'job_id'            => $job,
                        'target_id'         => $targetId
                    ]);
                    $this->jobTargetModel->insertMsgs($jobTargetData);
                }
            }

        }//end of insert targets & update form

        foreach ($request->list as $question){        

            $questionData = array([
                'question_number'       => $question['index'],
                'question_title'        => $question['question_title'],
                'image'                 => $question['question_image'],
                'form_id'               => $formId,
                'type_id'               => $question['type']
            ]); 
            //$this->questionModel->insertMsgs($questionData);
            
            $latestQuestion     = $this->questionModel->getLatest('id');
            $questionId         = $latestQuestion->id;
            $questionType       = $latestQuestion->type;

            if($question['items']){
                $contentNumber = 1;
                    foreach ($question['items'] as $item){
                        $itemData = array([
                            'content'               => $item['value'],
                            'content_number'        => $contentNumber,
                            'question_id'           => $questionId
                        ]);
                        //$this->questionItemModel->insertMsgs($itemData);
                        $contentNumber ++;
                    }
            }//end of questionItem
        }//end of question foreach loop

        return response()->json(['message'=>'true'],200);
    }

    public function imageUpload(Request $request){

        $file = $this->fileUpload($request,ConstantEnum::S3['surveies']);
        
        if($file == false){
            return response()->json(['message'=>'false'],400);
         }
        
        return $file;
    }


}
