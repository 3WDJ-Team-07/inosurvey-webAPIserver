<?php

namespace App\Models\Donations;

use Illuminate\Database\Eloquent\Model;


class Donation extends Model
{
    public $timestamps = false;
    protected $fillable = [

        'title',
        'content',
        'image',
        'target_amount',
        'current_amount',
        'started_at',
        'closed_at',
        'is_achieved',
        'donator_id',

    ];

    //user테이블 donation테이블 N-N
    //기부정보 - 후원자 정보
    public function users(){
        return $this->belongsToMany('App\Models\Users\User','donation_user','donation_id','sponsors_id');
    }

    //user테이블 donation테이블 1-N
    //기부정보 - 기부단체 정보
    public function user(){
        return $this->belongsTo('App\Models\Users\User','donator_id');
    }

    //donation테이블 form테이블 1-N
    public function form(){
        return $this->hasMany('App\Models\Surveies\Form');
    }

    //후원자 정보 조회
    public static function selectSponsors($id){
        return Donation::where('id',$id)->first()->users;
    }  

    //달성치 계산 (스캐줄링)
    public static function achieveAmount($id){
        $donation = Donation::where('id',$id)->first();
        $target_amount = $donation->target_amount;
        $current_amount = $donation->current_amount;
        $achieveAmount = floor($current_amount/$target_amount*100);
        return $achieveAmount;
    }
    
    //현재 금액 update
    public function updateAmount($id,$amount){
        Donation::where('id',$id)->increment('current_amount',$amount);
    }
}
