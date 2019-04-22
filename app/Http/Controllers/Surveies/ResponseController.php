<?php

namespace App\Http\Controllers\Surveies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\GuzzleController;

use App\Models\Surveies\Form;
use App\Models\Surveies\Question;
use App\Models\Surveies\QuestionItem;
use App\Models\Surveies\QuestionBank;

class ResponseController extends Controller
{ 
   
    private $formModel          = null;
    private $questionModel      = null;
    private $questionItemModel  = null;

    public function __construct() {
        $this->formModel            = new Form();
        $this->questionModel        = new Question();
        $this->questionItemModel    = new QuestionItem();
    }

    //설문조사 리스트 내용 select
    public function selectForm(Request $request){
        
        $value = $this->formModel->getMsg('id', $request->id);
        
        if($request->id ==1){
            return response()->json(['message' => 'true' , 'value' => $value],200);
        }else{
            return response()->json(['message' => 'false'],401);
        }
    }

    //설문조사 아이템, 질문 내용 select
    public function selectQuestionItem(Request $request){

        $formId         = $request->id;
        $questionItem   = $this->questionModel->selectItems($formId);
        return response()->json(['message' => 'true' , 'questionItem' => $questionItem],200);
    }

    //설문조사 내용 insert 
    public function insertForm(Requet $requet){

    }
}
