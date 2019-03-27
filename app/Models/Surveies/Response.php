<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    public $timestamps = false;
    protected $fillable = [

        'question_text',
        'question_id',
        'response_id',

    ];
}
