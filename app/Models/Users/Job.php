<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
}
