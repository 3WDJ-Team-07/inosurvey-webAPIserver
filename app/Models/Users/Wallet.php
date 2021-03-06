<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'public_key',
        'private_key',
        'user_id',
    ];

     //user테이블 wallet테이블 1-1
     public function user() {
        return $this->belongsTo(User::class);
   }
   
}
