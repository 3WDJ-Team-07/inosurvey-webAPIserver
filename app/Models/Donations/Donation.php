<?php

namespace App\Models\Donations;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelScopes;


class Donation extends Model
{
    use ModelScopes;

    protected $fillable = [

        'title',
        'content',
        'image',
        'target_amount',
        'current_amount',
        'closed_at',
        'is_achieved',
        'donator_id',

    ];

    //user테이블 donation테이블 N-N
    //기부정보 - 후원자 정보
    public function users(){
        return 
            $this->belongsToMany('App\Models\Users\User','donation_user','donation_id','sponsors_id')
            ->withPivot('id','donation_amount', 'created_at');
    }

    //user테이블 donation테이블 1-N
    //기부정보 - 기부단체 정보
    public function user(){
        return $this->belongsTo('App\Models\Users\User','donator_id');
    }

    //donation테이블 form테이블 1-N
    public function form(){
        return $this->hasMany('App\Models\Surveys\Form');
    }

    //donations테이블 categories테이블 N-N (중간테이블 category_donation)
    public function category(){
        return $this->belongsToMany('App\Models\Donations\Category','category_donation');
    }

    //기부 달성치 계산 
    public function achieveAmount($id,$ino){
        $donation = $this->where('id',$id)->first();
        $donation->increment('current_amount',$ino);

        if($donation->target_amount <= $donation->current_amount){
            $donation->update(['is_achieved' => 1]);
        }
    }


    //기부단체 리스트 
    public function donationList(){
        return $this->with('category');
    }

    //기부단체 기부자 리스트
    public function donorList($col,$arg){

        return $this->where($col,$arg)->with(['users','category']);
    }

}
