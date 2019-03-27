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
}
