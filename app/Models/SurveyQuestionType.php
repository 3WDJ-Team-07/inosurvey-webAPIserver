<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestionType extends Model
{
    public $timestamps = false;
    protected $fillable = ['type'];

    //survey_question_types테이블 survey_form_questions테이블 1-N
    public function surveyFormQuestion(){
        return $this->hasMany(SurveyFormQuestion::class);
    }
}
