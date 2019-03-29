<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class QuestionItem extends Model
{
    public $timestamps = false;
    protected $fillable = [

        'content',
        'content_number',
        'content_image',
        'question_id',
    
    ];

    



}
