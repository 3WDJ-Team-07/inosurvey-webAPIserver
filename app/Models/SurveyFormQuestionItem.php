<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyFormQuestionItem extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'content',
        'content_number',
        'content_image',
        'question_id',
    ];

    //survey_form_question_items테이블 survey_responses N-N (중간테이블-item_responses)
    public function surveyResponse(){
        return $this->belongsToMany(SurveyResponse::class , 'item_response','item_id','response_question_id');
    }
    
    //survey_form_question테이블 survey_form_questions_items테이블 1-N
    public function surveyQuestionType(){
        return $this->belongsTo(SurveyFormQuestion::class);
    }
}
