<?php

namespace App\Http\Controllers\Surveies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Helpers\ConstantEnum;
use App\Http\Controllers\Helpers\StoreImage;


use App\Models\Surveies\Form;
use App\Models\Surveies\Question;
use App\Models\Surveies\QuestionItem;
use App\Models\Surveies\QuestionBank;
use App\Models\Surveies\JobTarget;
use App\Models\Surveies\Target;
use App\Models\Users\job;




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
<<<<<<< HEAD
        
        // return $request->target['start_age'];
        // return $target = $request->get(['gender','responseNumber']);
        // return $targetIsActive = count($request->input('target.*.*'));
        // return $request->target['age']; //start랑 end로 나누기 
        
        // return $request->target['job']; //foreach나map로 돌리기

        // foreach($)
       


        
        $formData = array([
            'title'                 => $request->survey_title,
            'description'           => $request->survey_description,
            'respondent_number'     => $request->target['responseNumber'],
            'start_age'             => $request->target['start_age'],
            'end_age'               => $request->target['end_age'],
            'bgcolor'               => $request->bgcolor,
            'closed_at'             => $request->closed_at
            ]);


    
    // //   return dd($request->target['age']);
    //     $data = serialize($request->target['age']);
    //     return $data;
    //     // return  unserialize($data);
    //     return serialize($request->target['job']);
    //     // return $request->survey_title;
    //     // return $request->survey_description;
    //     // return $request->target['gender'];
    //     return $request->target['age'];
    //     // return $request->target['job'];
    //     // return $request->target['responseNumber'];
    //     // return $request->bgcolor;



            $this->formModel->create($formData);
            // $this->questionModel->create($questionData);
            // $this->questionItemModel->create($itemData);
=======

        $gender         = $request->input('target.gender');
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
            //'user_id'               => Auth::id()
            'user_id'               => '1',
            'is_sale'               => $request->is_sale
        ]);
        $this->formModel->insertMsgs($formData);
        $formId = $this->formModel->getLatest('started_at')->id;


        if($targetIsActive == true){
          
            $age        = $request->input('target.age','');
            $gender     = $request->target['gender'];
            $this->targetModel->create(['age' => $age, 'gender' => $gender]);

            $targetId   = $this->targetModel->getLatest('id')->id;

            if($request->target['job']){
                
                foreach ($request->target['job'] as $job){
                    $jobTargetData = array([
                        'job_id'            => $job,
                        'target_id'         => $targetId
                    ]);
                    $this->jobTargetModel->insertMsgs($jobTargetData);
                }
            }

            $this->formModel->UpdateMsg($formId, 'target_id', $targetId);
        }//end of insert targets & update form


        foreach ($request->list as $question){    
               
            $questionData = array([
                'question_number'       => $question['index'],
                'question_title'        => $question['question_title'],
                'image'                 => $question['question_image'],
                'form_id'               => $formId,
                'type_id'               => $question['type']
            ]); 
           $this->questionModel->insertMsgs($questionData);
            
            $questionId         = $this->questionModel->getLatest('id')->id;
            $questionType       = $this->questionModel->getLatest('id')->type_id;

            if($question['items']){
                    $contentNumber = 1;
                    foreach ($question['items'] as $item){
                        $itemData = array([
                            'content'               => $item['value'],
                            'content_number'        => $contentNumber,
                            'question_id'           => $questionId
                        ]);
                        $this->questionItemModel->insertMsgs($itemData);

                        $itemId = $this->questionItemModel->getLatest('id')->id;
                        if($questionType == 6) $this->questionItemModel->updateImg($itemId, $item['img']);
                        
                        $contentNumber ++;
                    }
            }//end of questionItem
        }//end of question foreach loop
>>>>>>> 0cb4aaaa40bd0a39ffc8c7bd867ec5865f5ac647

        return response()->json(['message'=>'true'],200);
    }




    public function index(){
        return $this->formModel->getSurveies();
    }




    public function uploadImage(Request $request){

        $file = $this->fileUpload($request,ConstantEnum::S3['surveies']);
        
        if($file == false){
            return response()->json(['message'=>'false'],400);
        }
        
        return $file;
    }


<<<<<<< HEAD
    public function deleteImage(Request $request){
        return $request->file;
        $filePath = 'https://s3.ap-northeast-2.amazonaws.com/inosurvey/surveies/02f50e22-ce9e-48bc-9c87-412768ddff86mountaineer-2080138_1920.jpg';
        Storage::disk('s3')->delete($filePath);    //$image = 삭제하려는 이미지명
        return 'true';
    }

=======
>>>>>>> 0cb4aaaa40bd0a39ffc8c7bd867ec5865f5ac647
}
