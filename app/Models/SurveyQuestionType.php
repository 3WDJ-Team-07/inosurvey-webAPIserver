<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestionType extends Model
{
    public $timestamps = false;
    protected $fillable = ['type'];
}
