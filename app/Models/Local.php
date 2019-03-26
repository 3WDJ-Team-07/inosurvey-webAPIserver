<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];


    //users테이블 locals테이블 1-N
    public function user(){
        return $this->hasMany(User::class);
    }

}
