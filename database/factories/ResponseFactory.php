<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\Response::class, function (Faker $faker) {
    $question_id_min = App\Models\Surveies\Question::min('id');
    $question_id_max = App\Models\Surveies\Question::max('id');
    $response_id_min = App\Models\Surveies\SurveyUser::min('id');
    $response_id_max = App\Models\Surveies\SurveyUser::max('id');
    
    return [
        'question_text' => $faker->text,
        'question_id' => $faker->numberBetween($question_id_min,$question_id_max) ,
        'response_id' => $faker->numberBetween($response_id_min,$response_id_max), 
    ];
});
