<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'age',
        'gender'
    ];

    //jobs테이블 targets테이블 N-N (중간테이블 job_target)
    public function jobs(){
        return $this->belongsToMany('App\Models\Users\Job','job_target');
    }
    
    //forms테이블 targets테이블 1-1
    public function form(){
        return $this->hasOne('App\Models\Surveies\Form');
    }

    //타겟 유저 선택
    public function selectTargetUser($id){
        $target = $this::where('id',$id)->get();
        //if(){

        //}

    }


}
