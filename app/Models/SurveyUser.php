<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyUser extends Model
{
    public $timestamps = false;
    protected $fillable = ['survey_id','respondent_id'];
    protected $table = 'survey_user';

    //survey_users테이블 survey_responses테이블 1-N
    public function surveyResponse(){
        return $this->hasMany(SurveyResponse::class);
    }
    
}
