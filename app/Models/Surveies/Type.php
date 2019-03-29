<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;
    protected $fillable = ['type'];


     //types테이블 questions테이블 1-N
     public function question(){
        return $this->hasMany('App\Models\Surveies\Question');
    }
}
