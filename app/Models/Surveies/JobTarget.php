<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class JobTarget extends Model
{
    public $timestamps = false;
    protected $fillable = ['job_id','target_id',];
    protected $table = 'job_target';
}
