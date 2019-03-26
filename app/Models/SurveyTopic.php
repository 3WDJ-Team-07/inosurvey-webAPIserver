<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyTopic extends Model
{
    public $timestamps = false;
    protected $fillable = ['topic'];

    
    //survey_topics테이블 Survey_forms테이블 1-N
    public function surveyForm(){
        return $this->hasMany(SurveyForm::class);
    }
}
