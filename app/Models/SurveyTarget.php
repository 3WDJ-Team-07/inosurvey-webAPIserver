<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyTarget  extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'start_age',
        'end_age',
        'gender',
        'job_id',
        'local_id'
    ];


    //survey_targets테이블 survey_forms테이블 1-1
    public function surveyForm(){
        return $this->hasOne(SurveyForm::class);
    }

    //jobs테이블 survey_targets테이블 1-N
    public function job(){
        return $this->belongsTo();
    }

    //locals테이블 survey_targets테이블 1-N
    public function local(){
        return $this->belongsTo();
    }
}
