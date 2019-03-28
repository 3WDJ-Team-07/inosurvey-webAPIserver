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
    public function donation(){
        return $this->belongsToMany('App\Models\Donations\Donation','donation_user','donation_id','sponsors_id');
    }


    //패스워드 저장시 Hash속성으로 변환
    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }



}
