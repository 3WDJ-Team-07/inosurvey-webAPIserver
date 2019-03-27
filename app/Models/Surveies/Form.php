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
        'created_at'

    ];

}
