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

    public function user(){
        return $this->belongsToMany('App\Models\Users\User','donation_user','donation_id','sponsors_id');
    }
}
