<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\QuestionBank::class, function (Faker $faker) {
    $questions = array(
        'survey_title' => "지난 12개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            'values' =>[ 
                '귀하의 의료 제공자',
                '의료 제공자 입력',
            ],
            'items' =>[ 
                '귀하의 의료 제공자',
                '의료 제공자 입력',
                '의료 제공자 입력',
                '의료 제공자 입력',
                '의료 제공자 입력',
            ],
    );
    
    return [
        'questions' => $questions,
    ];
});
