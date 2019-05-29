<?php

namespace App\Models\Donations;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $hidden = [
        'category_pivot',
       
    ];
    //donations테이블 categories테이블 N-N (중간테이블 category_donation)
    public function donation(){
        return $this->belongsToMany('App\Models\Donations\Donation','category_donation')->as('category_pivot');
    }

}
