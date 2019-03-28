<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class ReplyableUser extends Model
{
    public $timestamps = false;
    protected $fillable = ['replyable_id','survey_id',];
    protected $table = 'replyable_user';
}
