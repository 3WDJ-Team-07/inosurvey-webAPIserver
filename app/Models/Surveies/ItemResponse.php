<?php

namespace App\Models\Surveies;

use Illuminate\Database\Eloquent\Model;

class ItemResponse extends Model
{
    public $timestamps = false;
    protected $fillable = ['response_id','item_id'];
    protected $table = 'item_response';
    
}
