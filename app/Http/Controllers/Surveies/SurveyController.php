<?php

namespace App\Http\Controllers\Surveies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Helpers\StoreImage;
use App\Http\Controllers\Helpers\ConstantEnum;

use App\Http\Controllers\Helpers\GuzzleController;


class SurveyController extends Controller {
    
    use StoreImage;

    private $formModel          = null;
    private $questionModel      = null;
    private $questionItemModel  = null;

    public function __construct() {
        $this->formModel            = new Form();
        $this->questionModel        = new Question();
        $this->questionItemModel    = new QuestionItem();
    }




    //설문 작성
    public function create(Request $request){
      
    
       return $request; 
        

    //   return dd($request->target['age']);
        $data = serialize($request->target['age']);
        return $data;
        // return  unserialize($data);
        return serialize($request->target['job']);
        // return $request->survey_title;
        // return $request->survey_description;
        // return $request->target['gender'];
        return $request->target['age'];
        // return $request->target['job'];
        // return $request->target['responseNumber'];
        // return $request->bgcolor;



            $this->formModel->create($formData);
            $this->questionModel->create($questionData);
            $this->questionItemModel->create($itemData);

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
