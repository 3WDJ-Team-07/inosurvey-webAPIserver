<?php

namespace App\Models\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use App\Traits\ModelScopes;

use App\Models\Surveies\SurveyUser;
use App\Models\Surveies\JobTarget;
class User extends Authenticatable
{
    use Notifiable,ModelScopes;

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

    protected $hidden = [
        'user_id',
        'password',
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
    //후원자 정보 - 기부정보
    public function donations(){
        return $this->belongsToMany('App\Models\Donations\Donation','donation_user','sponsors_id','donation_id');
    }
    
    //user테이블 donation테이블 1-N
    //기부정보 - 기부단체 정보
    public function donation(){
        return $this->hasMany('App\Models\Donations\Donation','donator_id');
    }

    //user테이블 form테이블 1-N
    public function form(){
        return $this->hasMany('App\Models\Surveies\Form');
    }

    //user테이블 form테이블 N-N(중간테이블-survey_user)
    public function respondentForms(){
        return $this->belongsToMany('App\Models\Surveies\Form','survey_user','respondent_id','survey_id');
    }

    //user테이블 form테이블 N-N(중간테이블-replyable_user)
    public function replyableForms(){
        return $this->belongsToMany('App\Models\Surveies\Form','replyable_user','replyable_id','survey_id');
    }

    //패스워드 저장시 Hash속성으로 변환
    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }

    //출생연도 현재나이(한국기준)로 반환
    public function getAgeAttribute($age){
        $nowDate    = date('Y');
        $age        = $nowDate-$age+1;
        $ageGroup   = floor($age/10);
        $ageGroup   = $ageGroup*10;
        return $ageGroup;
    }
    
    //기부단체 회원 - 기부 테이블 조회 
    public function selectDonation($id){
        return $this->where('id',$id)->first()->donations;
    }

    //age 필터링
    public function filterGender($gender){
        if($gender !=0){
            $users = $this->where('gender',$gender);
        } else {
            $users = $this->whereIn('gender',[1,2]);
        }
        return $users;
    }

    //응답가능 유저 선택(설문요청저장)
    public function getReplyableUser($gender, $target, $targetId, $existJob){
        $users = $this->filterGender($gender);

        if(count($target['age']) != 0){
            $nowDate    = date('Y');
            $ageArray = array();
            //$users = $users->whereIn('age',$target['age']);
            foreach($target['age'] as $age){
                for($i=-1;$i<9;$i++){//한국나이 기준이므로! 
                    array_push($ageArray, $nowDate-$age-$i);
                }    
            }
            $users  = $users->whereIn('age',$ageArray);
        }
        if($existJob){
            $jobs   = JobTarget::where('target_id',$targetId)->get()->pluck('job_id')->toArray();
            $users  = $users->whereIn('job_id',$jobs);
        }

        return $users;
    }

    //필터링 한 유저 선택(설문분석)
    public function getTrappedUser($gender,$age,$job){

        $users = $this->filterGender($gender);
        if($age != 0){
            $nowDate    = date('Y');
            $users = $users->whereBetween('age',[$nowDate-$age-8,$nowDate-$age+1]);
        }
        if($job != 0){
            $users  = $users->where('job_id',$job);
        }

        return $users;
    }

    //필터링 == true인 form select
    public function getTrappedForm($userId){
        return $form = $this->where('id',$userId)->first()->replyableForms;
    }

    
}
