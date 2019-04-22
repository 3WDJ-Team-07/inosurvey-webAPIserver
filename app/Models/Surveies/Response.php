<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public $timestamps = false;
    protected $fillable = [

        'question_text',
        'question_id',
        'response_id',

    ];

    //survey_user테이블 response테이블 1-N(외래키 response_id)
    public function surveyUser(){
        return $this->belongsTo('App\Models\Surveies\SurveyUser','response_id');
    }
    //response테이블 questionItems테이블 N-N (중간테이블 item_response)
    public function questionItems(){
        return $this->belongsToMany('App\Models\Surveies\QuestionItem','item_response','response_id','item_id');
    }  
    //question테이블 responses테이블 1-N
    public function question(){
        return $this->belongsTo('App\Models\Surveies\Question');
    }
}
