<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyFormQuestion extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title',
        'number',
        'image',
        'survey_id',
        'type_id'
    ];
}
