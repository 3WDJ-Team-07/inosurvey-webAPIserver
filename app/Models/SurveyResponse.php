<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyResponse extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'question_text',
        'question_id',
        'response_id',
    ];
}
