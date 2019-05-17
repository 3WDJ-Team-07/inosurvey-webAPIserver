<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelScopes;

class Target extends Model
{
    use ModelScopes;

    public $timestamps = false;
    protected $fillable = [
        'age',
        'gender',
        ];

    //jobs테이블 targets테이블 N-N (중간테이블 job_target)
    public function job(){
        return $this->belongsToMany('App\Models\Users\Job','job_target');
    }
    
    //forms테이블 targets테이블 1-1
    public function form(){
        return $this->hasOne('App\Models\Surveys\Form');
    }

    
    //나이 저장시 json속성 포맷 변환
    public function setAgeAttribute($value) {
        $this->attributes['age'] = json_encode($value,JSON_UNESCAPED_UNICODE);
    }

    //나이 추출시 배열 속성 포맷 변환
    public function getAgeAttribute($value)
    {
        return json_decode($value,true);
    }

}
