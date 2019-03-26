<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyFormQuestionItem extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'content',
        'content_number',
        'content_image',
        'question_id',
    ];
}
