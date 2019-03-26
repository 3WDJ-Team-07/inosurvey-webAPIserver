<?php

use Faker\Generator as Faker;

$factory->define(App\Models\SurveyForm::class, function (Faker $faker) {
    $topic_id_min = App\Models\SurveyTopic::min('id');
    $topic_id_max = App\Models\SurveyTopic::max('id');
    $target_id_min = App\Models\SurveyTarget::min('id');
    $target_id_max = App\Models\SurveyTarget::max('id');
    return [
        'title' => $faker->word,
        'description' => $faker->text, 
        // 'closed_at' => '',  
        // 'is_sale' => '', 
        // 'is_relation ' => '',
        // 'respondent_count' => '', 
        'respondent_number' => rand(1,200),
        'topic_id' => $faker->numberBetween($topic_id_min,$topic_id_max),
        'target_id' => $faker->numberBetween($target_id_min,$target_id_max),
    ];
});
