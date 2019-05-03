<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class ItemResponse extends Model
{
    public $timestamps = false;
    protected $fillable = ['response_id','item_id'];
    protected $table = 'item_response';
    
    //questions테이블 itemResponse테이블 1-N
    public function questionItem(){
        return $this->belongsTo('App\Models\Surveies\QuestionItem');
    }
}
