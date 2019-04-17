<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;
use App\Traits\ModelScopes;

class Question extends Model
{
    use ModelScopes;
    
    public $timestamps = false;
    protected $fillable = [

        'question_title',
        'question_number',
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
    public function responses(){
        return $this->hasMany('App\Models\Surveies\Response');
    } 
    
    //questions테이블 questionItems테이블 1-N
    public function questionItems(){
        return $this->hasMany('App\Models\Surveies\QuestionItem');
    } 

    public function selectItems($id){

            $questionItem = Question::with(['questionItems' => function ($query){
                    $query->orderBy('content_number','asc');
                }
            ])->where('form_id',$id)->orderBy('question_number','asc')->get();

        return $questionItem;    
    }
}
