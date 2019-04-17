<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\QuestionBank::class, function (Faker $faker) {
    
    $questions = array(
        'survey_title' => "지난 12개월 동안 의료와 관계된 질문으로 정상 진료 시간 후에 ()에게 전화하셨습니까?",
            'values' =>array( 
                '귀하의 의료 제공자',
                '직접입력',
                ),
            'items' =>array(
                array('value' => '귀하의 의료 제공자'),
                array('value' => '귀하의 의료 제공자'),
                array('value' => '귀하의 의료 제공자'),
                array('value' => '귀하의 의료 제공자'),
                array('value' => '귀하의 의료 제공자'),
                ),
    );
    
    return [
        'questions' => $questions
    ];
});
