<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'password', 
        'email',
        'nickname',
        'gender',
        'age',
        'job_id',
        'local_id'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

     //users테이블 wallet테이블 1-1
    public function wallet() { 
        return $this->hasOne(Wallet::class);
    }
    
    //users테이블 jobs테이블 1-1
    public function job(){
        return $this->belongsTo(Job::class);
    }

    //users테이블 locals테이블 1-1
    public function local(){
        return $this->belongsTo(Local::class);
    }

    //users테이블 survey_forms테이블 N-N (중간테이블-survey_users)
    public function surveyForm(){
        return $this->belongsToMany(SurveyForm::class,'survey_user','survey_id','respondent_id');
    }
    
    //패스워드 저장시 Hash속성으로 변환
    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

}
