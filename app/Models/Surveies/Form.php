<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelScopes;

class Form extends Model
{
    use ModelScopes;
    
    public $timestamps = false;
    protected $fillable = [
        
        'title',
        'description',
        'respondent_number',
        'respondent_count',
        'is_completed',
        'is_sale',
        'target_id',
        'started_at',
        'closed_at',
        'started_at',
        'targer_isactive',
        'bgcolor',
        'user_id'

    ];

  
    //forms테이블 targets테이블 1-1
    public function target(){
        return $this->belongsTo('App\Models\Surveies\Target');
    }
  
    //forms테이블 questions테이블 1-N
     public function question(){
        return $this->hasMany('App\Models\Surveies\Question');
    }

    //user테이블 form테이블 1-N
    public function user(){
        return $this->belongsTo('App\Models\Users\User');
    }

    //form테이블 user테이블 N-N(중간테이블-survey_user)
    public function respondentUsers(){
        return $this->belongsToMany('App\Models\Users\User','survey_user','survey_id','respondent_id');
    }
    //form테이블 user테이블 N-N(중간테이블-replyable_user)
    public function replyableUsers(){
        return $this->belongsToMany('App\Models\Users\User','replyable_user','survey_id','replyable_id');
    }

    //started_at칼럼 현재 시간 저장
    public static function boot() {
         parent::boot(); static::creating(function ($model) {
        $model->started_at = $model->freshTimestamp(); 
       });
    }


    //설문 정보 스코프
    public function scopeGetSurveies(){
        return $this->with(['user','target.job','question.questionItems']);
    }

    // 판매 설문 리스트
    public function saleList(){
        return $this->getSurveies()->where('is_sale',1)->where('is_completed',1);
    }

    // 완료(is_sale = false) 설문 리스트
    public function completedList($userId){
        return $this->getData('user_id',$userId)->where('is_sale',0)->where('is_completed',1);
    }

    //설문 폼 정보 (Android)
    public function getSurveiesForm(){
        return $this->with(['user','target.job'])->get();
    }

    
    // 현재시간과 마감시간이 같은 설문폼을 추출
    public function isCompleted(){
        $now = date('Y-m-d H:i:s');
        
        return $this->whereTime($now,'>','closed_at');
    }
}                       
