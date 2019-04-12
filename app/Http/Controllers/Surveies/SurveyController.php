<?php

namespace App\Http\Controllers\Surveies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Surveies\Form;
use App\Models\Surveies\Question;
use App\Models\Surveies\QuestionItem;


class SurveyController extends Controller {
    
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

        $formData = $request->only([
            'title',
            'description',
            'respondent_number',
            'is_sale',
            'targer_isactive',
            'donation_id',
            'closed_at'
            ]);

        $questionData = $request->only([
            'question_title',
            'question_number',
            'respondent_number',
            'image',
            'form_id',
            'type_id'
            ]);

        $itemData = $request->only([
            'content',
            'content_number',
            'content_image',
            'question_id',
            ]);        
            
            
            $this->formModel->create($formData);
            $this->questionModel->create($questionData);
            $this->questionItemModel->create($itemData);

        return response()->json(['message'=>'true'],200);
    }


}
