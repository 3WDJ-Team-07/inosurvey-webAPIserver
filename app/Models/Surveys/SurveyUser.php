<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Model;

class SurveyUser extends Model
{
    public $timestamps = false;
    protected $fillable = ['survey_id','respondent_id'];
    protected $table = 'survey_user';


     //survey_user테이블 response테이블 1-N(외래키 response_id)
     public function response(){
        return $this->hasMany('App\Models\Surveys\Response','response_id');
    }
}
