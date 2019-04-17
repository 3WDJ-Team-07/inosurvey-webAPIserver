<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelScopes;

class Target extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'start_age',
        'end_age',
        'gender',
        'job_id',
    ];

    //jobs테이블 targets테이블 1-N
    public function job(){
        return $this->belongsTo('App\Models\Users\Job');
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
