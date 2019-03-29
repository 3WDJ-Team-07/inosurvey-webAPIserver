<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    protected $fillable = [

        'title',
        'number',
        'image',
        'survey_id',
        'type_id',

    ];


     //types테이블 questions테이블 1-N
     public function type(){
        return $this->belongsTo('App\Models\Surveies\Type');
    }
}
