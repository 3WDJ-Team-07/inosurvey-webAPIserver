<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyFormQuestion extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'number',
        'image',
        'survey_id',
        'type_id'
    ];

    //survey_form_questions테이블 survey_responses테이블 1-N
    public function surveyResponse(){
        return $this->hasMany(SurveyResponse::class);
    }

    //survey_form_questions테이블 survey_form_question_items테이블 1-N
    public function surveyFormQuestionItem(){
        return $this->hasMany(SurveyFormQuestionItem::class);
    }

    //survey_question_types테이블 survey_form_questions테이블 1-N
    public function surveyQuestionType(){
        return $this->belongsTo(SurveyQuestionType::class);
    }

    //survey_forms테이블 survey_form_questions테이블 1-N
    public function surveyForm(){
        return $this->belongsTo(SurveyForm::class);
    }
    
}
