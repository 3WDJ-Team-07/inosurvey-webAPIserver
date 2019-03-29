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
        'form_id',
        'type_id',

    ];


     //types테이블 questions테이블 1-N
     public function type(){
        return $this->belongsTo('App\Models\Surveies\Type');
    }

      //forms테이블 questions테이블 1-N
      public function form(){
        return $this->belongsTo('App\Models\Surveies\Form');
    }

    //questions테이블 reponses테이블 1-N
       public function response(){
        return $this->hasMany('App\Models\Surveies\Response');
    } 
    
    //questions테이블 questionItems테이블 1-N
    public function questionItem(){
        return $this->hasMany('App\Models\Surveies\QuestionItem');
    } 
}
