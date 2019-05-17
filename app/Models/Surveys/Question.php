<?php

namespace App\Models\Surveys;

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
        return $this->belongsTo('App\Models\Surveys\Type');
    }

      //forms테이블 questions테이블 1-N
      public function form(){
        return $this->belongsTo('App\Models\Surveys\Form');
    }

    //questions테이블 reponses테이블 1-N
    public function responses(){
        return $this->hasMany('App\Models\Surveys\Response');
    } 
    
    //questions테이블 questionItems테이블 1-N
    public function questionItems(){
        return $this->hasMany('App\Models\Surveys\QuestionItem');
    } 



    
    public function selectItems($id){

            $questionItem = $this->with(['questionItems' => function ($query){
                    $query->oldest('content_number');
                }
            ])->where('form_id',$id)->orderBy('question_number','asc')->get();


        return $questionItem;    
    }

}
