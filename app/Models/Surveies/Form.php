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
        'donation _organization',
        'targer_isactive'

    ];

    //topic테이블 form테이블 1-N
    public function topic()
    {
        return $this->belongsTo('App\Models\Surveies\Topic');
    }

}
