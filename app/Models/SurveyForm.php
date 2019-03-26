<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
class SurveyForm extends Model
{
    protected $fillable = [
        'title',
        'description',
        'respondent_number',
        'is_completed','closed_at',
        'is_sale',
        'is_relation',
        'respondent_count',
        'topic_id',
        'target_id'
    ];


    //survey_forms테이블 survey_form_questions테이블 1-N
    public function surveyFormQuestion(){
        return $this->hasMany(SurveyFormQuestion::class);
    }

    //survey_forms테이블 survey_users테이블 1-N
    public function surveyUser(){
        return $this->hasMany(SurveyUser::class);
    }

    //survey_topics테이블 Survey_forms테이블 1-N 
    public function surveyTopic(){
        return $this->belongsTo(SurveyTopic::class);
    }

    //survey_forms테이블 survey_targets테이블 1-1
    public function surveyForm(){
        return $this->belongsTo(SurveyForm::class);
    }
    
}
