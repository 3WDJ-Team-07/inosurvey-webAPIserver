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


    //패스워드 저장시 Hash속성으로 변환
    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }



}
