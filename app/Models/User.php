<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
    
    //user테이블 jobs테이블 1-1
    public function job(){
        return $this->belongsTo(Job::class);
    }

    //user테이블 locals테이블 1-1
    public function local(){
        return $this->belongsTo(Local::class);
    }

}
