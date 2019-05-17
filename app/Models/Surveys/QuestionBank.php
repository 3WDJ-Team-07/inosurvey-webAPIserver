<?php

namespace App\Models\Surveys;

use Illuminate\Database\Eloquent\Model;

class QuestionBank extends Model
{
    public $timestamps = false;
    protected $fillable = ['questions'];
    protected $casts = [
        'questions' => 'object',
    ];

     //질문 저장시 json속성 포맷 변환
    public function setQuestionsAttribute($value) {
        $this->attributes['questions'] = json_encode($value,JSON_UNESCAPED_UNICODE);
    }
}
