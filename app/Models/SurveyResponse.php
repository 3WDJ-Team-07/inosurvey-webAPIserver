<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'question_text',
        'question_id',
        'response_id',
    ];

    //survey_form_question_items테이블 survey_responses N-N (중간테이블-item_responses)
    public function surveyFormQuestionItem(){
        return $this->belongsToMany(surveyFormQuestionItem::class , 'item_response','response_question_id','item_id');
    }
    
    //survey_form_questions테이블 survey_responses테이블 1-N
    public function surveyFormQuestion(){
        return $this->belongsTo(SurveyFormQuestion::class);
    }

    //survey_users테이블 survey_responses테이블 1-N
    public function surveyUser(){
        return $this->belongsTo(SurveyUser::class);
    }

}
