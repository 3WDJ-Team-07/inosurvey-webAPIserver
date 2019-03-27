<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'start_age',
        'end_age',
        'gender',
        'job_id',
    ];
}
