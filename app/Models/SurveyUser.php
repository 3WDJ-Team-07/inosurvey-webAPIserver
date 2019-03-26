<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyUser extends Model
{
    public $timestamps = false;
    protected $fillable = ['survey_id','respondent_id'];
    protected $table = 'survey_user';
}
