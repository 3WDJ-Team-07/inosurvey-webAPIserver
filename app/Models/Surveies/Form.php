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
        'topic_id',
        'target_id',
        'started_at',
        'closed_at',
        'started_at',
        'targer_isactive'

    ];

    //topic테이블 form테이블 1-N
    public function topic()
    {
        return $this->belongsTo('App\Models\Surveies\Topic');
    }

    //forms테이블 targets테이블 1-1
    public function target(){
        return $this->belongsTo('App\Models\Surveies\Target');
    }
  
    //forms테이블 questions테이블 1-N
     public function question(){
        return $this->hasMany('App\Models\Surveies\Question');
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

}
