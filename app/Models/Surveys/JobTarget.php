<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelScopes;

class JobTarget extends Model
{
    use ModelScopes;
    
    public $timestamps = false;
    protected $fillable = ['job_id','target_id',];
    protected $table = 'job_target';
}
