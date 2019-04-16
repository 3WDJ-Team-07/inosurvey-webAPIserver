<?php

namespace App\Models\Users;

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
        'is_donator', 
    ];

    protected $hidden = ['password'];
    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */


    //users테이블 wallet테이블 1-1
    public function wallet() { 
        return $this->hasOne('App\Models\Users\Wallet');
    }
    
    //user테이블 jobs테이블 1-1
    public function job(){
        return $this->belongsTo('App\Models\Users\Job');
    }


    //user테이블 donation테이블 
    //후원자 정보 - 기부정보
    public function donations(){
        return $this->belongsToMany('App\Models\Donations\Donation','donation_user','sponsors_id','donation_id');
    }
    
    //user테이블 donation테이블 1-N
    //기부정보 - 기부단체 정보
    public function donation(){
        return $this->hasMany('App\Models\Donations\Donation','donator_id');
    }

    // //user테이블 form테이블 1-N
    // public function form(){
    //     return $this->hasMany('App\Models\Surveies\Form');
    // }

    //user테이블 form테이블 N-N(중간테이블-survey_user)
    public function respondentForms(){
        return $this->belongsToMany('App\Models\Surveies\Form','survey_user','respondent_id','survey_id');
    }

    //user테이블 form테이블 N-N(중간테이블-survey_user)
    public function replyableForms(){
        return $this->belongsToMany('App\Models\Surveies\Form','replyable_user','replyable_id','survey_id');
    }

    //패스워드 저장시 Hash속성으로 변환
    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

    //나이 연령대로 반환
    public function getAgeAttribute($age){
        $nowDate = date('Y');
        $ageGroup = $nowDate-$age+1;
        return $ageGroup;
    }
    
    //기부단체 회원 - 기부 테이블 조회 
    public function selectDonation($id){
        return $this->where('id',$id)->first()->donations;
    }

}
