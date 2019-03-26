<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyTarget  extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'start_age',
        'end_age',
        'gender',
        'job_id',
        'local_id'
    ];
}
