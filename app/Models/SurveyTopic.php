<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyTopic extends Model
{
    public $timestamps = false;
    protected $fillable = ['topic'];
}
