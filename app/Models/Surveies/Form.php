<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelScopes;

class Form extends Model
{
    use ModelScopes;
    
    protected $fillable = [
        
        'title',
        'description',
        'respondent_number',
        'respondent_count',
        'is_completed',
        'is_sale',
        'target_id',
        'closed_at',
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



    //설문 정보 스코프
    public function getSurveies(){
        return $this->with(['user','target.job','question.questionItems']);
    }

    // 판매 설문 리스트
    public function saleList(){
        return $this->getSurveies()->where('is_sale',1)->where('is_completed',1);
    }

    // 완료(is_sale = false) 설문 리스트
    // public function completedList($col,$arg){
    //     return $this->where($col,$arg)->where('is_sale',0)->where('is_completed',1);
    // }

    //자신의 요청한 설문은 구매 할 수 없다.
    public function purchaseVerification($request){
        $mySurvey = $this->where('id',$request->id)->first();
        
        if($mySurvey->user_id == $request->user_id ){
            return true;
        }
        
    }

    //설문 폼 정보 (Android)
    public function getSurveiesForm(){
        return $this->with(['user','target.job'])->get();
    }
   //설문 응답자 정보 
    public function respondent(){
        return $this->with(['respondentUsers']);
    }

    //응답자 필터링&&진행중 forms -> 응답 했던 설문조사 필터링
    public function getReplyableForm($trappedForms, $userId){
        $trappedFormsArray      = $trappedForms->pluck('id')->toArray();
        $respondedFormsArray    = SurveyUser::where('respondent_id','like',$userId)->get()->pluck('survey_id')->toArray();

        if($respondedFormsArray){
            return $this->whereIn('id',$trappedFormsArray)->whereNotIn('id',$respondedFormsArray)->where('is_completed',0);
        }else{ 
            return $this->whereIn('id',$trappedFormsArray)->where('is_completed',0);
        }
    }
}                       
