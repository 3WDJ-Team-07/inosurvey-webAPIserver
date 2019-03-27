<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\Question::class, function (Faker $faker) {
    $survey_id_min = App\Models\Surveies\Form::min('id');
    $survey_id_max = App\Models\Surveies\Form::max('id');
    $type_id_min = App\Models\Surveies\Type::min('id');
    $type_id_max = App\Models\Surveies\Type::max('id');
   
    return [
        'title' => $faker->word,
        'number' => 1,
        'image' => 'imagesExample',
        'survey_id' => $faker->numberBetween($survey_id_min,$survey_id_max),
        'type_id' => $faker->numberBetween($type_id_min,$type_id_max),
    ];
});
