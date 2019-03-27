<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\SurveyUser::class, function (Faker $faker) {
    
    $survey_id_min = App\Models\Surveies\Form::min('id');
    $survey_id_max = App\Models\Surveies\Form::max('id');
    $respondent_id_min = App\Models\Users\User::min('id');
    $respondent_id_max = App\Models\Users\User::max('id');
    
    return [
        'survey_id' => $faker->numberBetween($survey_id_min,$survey_id_max),
        'respondent_id' => $faker->numberBetween($respondent_id_min,$respondent_id_max),
    ];
});
