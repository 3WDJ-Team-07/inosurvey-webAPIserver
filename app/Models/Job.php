<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    //jobs테이블 users테이블 1-N
    public function user(){
        return $this->hasMany(User::class);
    }

    //jobs테이블 survey_targets테이블 1-N
    public function surveyTarget(){
        return $this->hasMany(SurveyTarget::class);
    }
    
    //jobs테이블 locals테이블 1-1 (중간테이블-users)
    public function local(){
        return $this->hasOneThrough(Local::class , User::class);
    }
    

}
