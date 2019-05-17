<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelScopes;

class ReplyableUser extends Model
{
    use ModelScopes;
    
    public $timestamps = false;
    protected $fillable = ['replyable_id','survey_id',];
    protected $table = 'replyable_user';
}
