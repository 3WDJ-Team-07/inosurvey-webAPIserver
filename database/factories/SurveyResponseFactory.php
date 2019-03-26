<?php

use Faker\Generator as Faker;

$factory->define(App\Models\SurveyResponse::class, function (Faker $faker) {
    $question_id_min = App\Models\SurveyFormQuestion::min('id');
    $question_id_max = App\Models\SurveyFormQuestion::max('id');
    $response_id_min = App\Models\SurveyUser::min('id');
    $response_id_max = App\Models\SurveyUser::max('id');
    
    return [
        'question_text' => $faker->text,
        'question_id' => $faker->numberBetween($question_id_min,$question_id_max) ,
        'response_id' => $faker->numberBetween($response_id_min,$response_id_max), 
    ];
});
