<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class QuestionItem extends Model
{
    public $timestamps = false;
    protected $fillable = [

        'content',
        'content_number',
        'content_image',
        'question_id',
    
    ];

    //questions테이블 questionItems테이블 1-N
    public function question(){
        return $this->belongsTo('App\Models\Surveies\Question');
    }

    //response테이블 questionItems테이블 N-N
    public function responses(){
        return $this->belongsToMany('App\Models\Surveies\Response','item_response','item_id','response_id');
    }  

}
