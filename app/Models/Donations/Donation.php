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
    public function users(){
        return $this->belongsToMany('App\Models\Users\User','donation_user','donation_id','sponsors_id');
    }

    //started_at 현재 시간 저장
    public static function boot() {
        parent::boot(); static::creating(function ($model) {
        $model->started_at = $model->freshTimestamp(); 
        });
    }
}
