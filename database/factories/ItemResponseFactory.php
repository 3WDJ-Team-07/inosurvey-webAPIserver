<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ItemResponse::class, function (Faker $faker) {
    
    $response_question_id_min = App\Models\SurveyResponse::min('id');
    $response_question_id_max = App\Models\SurveyResponse::max('id');
    $item_id_min = App\Models\SurveyFormQuestionItem::min('id');
    $item_id_max = App\Models\SurveyFormQuestionItem::max('id');

    return [
        'response_question_id' =>  $faker->numberBetween($response_question_id_min,$response_question_id_max),
        'item_id' =>  $faker->numberBetween($item_id_min,$item_id_max),
    ];
});
