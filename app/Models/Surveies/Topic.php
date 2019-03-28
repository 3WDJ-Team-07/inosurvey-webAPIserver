<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    public $timestamps = false;
    protected $fillable = ['topic'];


    public function form()
    {
        return $this->hasMany('App\Models\Surveies\Form');
    }

}
