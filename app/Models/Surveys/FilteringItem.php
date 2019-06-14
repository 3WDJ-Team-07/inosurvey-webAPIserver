<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Model;

class FilteringItem extends Model
{
    public $timestamps  = false;
    protected $fillable = ['question_id','item_id'];
    protected $table    = 'filtering_items';


    //filtering_items테이블 questions테이블 1-1
    public function question(){
        return $this->hasOne('App\Models\Surveys\Question');
    }

    //filtering_items테이블 question_items테이블 1-1
    public function questionItem(){
        return $this->belongsTo('App\Models\Surveys\QuestionItem');
    }
}
