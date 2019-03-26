<?php

use Faker\Generator as Faker;

$factory->define(App\Models\SurveyFormQuestion::class, function (Faker $faker) {
    $survey_id_min = App\Models\SurveyForm::min('id');
    $survey_id_max = App\Models\SurveyForm::max('id');
    $type_id_min = App\Models\SurveyQuestionType::min('id');
    $type_id_max = App\Models\SurveyQuestionType::max('id');

   
    return [
        'title' => 'It was a very pleasant day',
        'number' => 1,
        'image' => 'imagesExample',
        'survey_id' => $faker->numberBetween($survey_id_min,$survey_id_max),
        'type_id' => $faker->numberBetween($type_id_min,$type_id_max),
    ];
});
