<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;
class SurveyForm extends Model
{
    protected $fillable = [
        'title',
        'description',
        'respondent_number',
        'is_completed','closed_at',
        'is_sale',
        'is_relation',
        'respondent_count',
        'topic_id'
        ,'target_id'
    ];
}
