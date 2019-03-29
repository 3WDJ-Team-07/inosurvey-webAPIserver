<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
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
        'closed_at',
        'created_at',
        'donation_id',
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

    //donations테이블 forms테이블 1-N
    public function donation(){
        return $this->belongsTo('App\Models\Donations\Donation');
    }

}
