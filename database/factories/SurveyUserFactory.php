<?php

use Faker\Generator as Faker;

$factory->define(App\Models\SurveyUser::class, function (Faker $faker) {

    $survey_id_min = App\Models\SurveyForm::min('id');
    $survey_id_max = App\Models\SurveyForm::max('id');
    $respondent_id_min = App\Models\User::min('id');
    $respondent_id_max = App\Models\User::max('id');
    
    return [
        'survey_id' => $faker->numberBetween($survey_id_min,$survey_id_max),
        'respondent_id' => $faker->numberBetween($respondent_id_min,$respondent_id_max),
    ];
});
