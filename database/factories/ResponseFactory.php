<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveys\Response::class, function (Faker $faker) {
    $question_id_min = App\Models\Surveys\Question::min('id');
    $question_id_max = App\Models\Surveys\Question::max('id');
    $response_id_min = App\Models\Surveys\SurveyUser::min('id');
    $response_id_max = App\Models\Surveys\SurveyUser::max('id');
    
    return [
        'question_text' => $faker->text,
        'question_id'   => 1 ,
        'response_id'   => 1, 
    ];
});
