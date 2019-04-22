<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    //users테이블 jobs테이블 1-N
    public function user(){
        return $this->hasMany('App\Models\Users\User');
    }
    
    //jobs테이블 targets테이블 N-N (중간테이블 job_target)
    public function target(){
        return $this->belongsToMany('App\Models\Surveies\Target','job_target');
    }
}
