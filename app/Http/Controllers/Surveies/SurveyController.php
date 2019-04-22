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


    public function deleteImage(Request $request){
        return $request->file;
        $filePath = 'https://s3.ap-northeast-2.amazonaws.com/inosurvey/surveies/02f50e22-ce9e-48bc-9c87-412768ddff86mountaineer-2080138_1920.jpg';
        Storage::disk('s3')->delete($filePath);    //$image = 삭제하려는 이미지명
        return 'true';
    }

}
