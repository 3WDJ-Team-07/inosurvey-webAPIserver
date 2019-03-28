<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public $timestamps = false;
    protected $fillable = ['topic'];

    //topic테이블 form테이블 1-N
    public function form()
    {
        return $this->hasMany('App\Models\Surveies\Form');
    }

}
