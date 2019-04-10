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
        'created_at',
        'closed_at',
        'is_achieved',
        'donator_id',

    ];

    //user테이블 donation테이블 N-N
    public function users(){
        return $this->belongsToMany('App\Models\Users\User','donation_user','donation_id','sponsors_id');
    }

    public function form(){
        return $this->hasMany('App\Models\Surveies\Form');
    }


}
