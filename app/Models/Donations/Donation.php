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
        'create_at',
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

    public function form(){
        return $this->hasMany('App\Models\Surveies\Form');
    }


}
