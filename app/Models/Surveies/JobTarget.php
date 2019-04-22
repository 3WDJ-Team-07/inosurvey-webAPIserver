<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelScopes;

class JobTarget extends Model
{
    use ModelScopes;
    
    public $timestamps = false;
    protected $fillable = ['job_id','target_id',];
    protected $table = 'job_target';
}
