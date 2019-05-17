<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveys\Question::class, function (Faker $faker) {
    $form_id_min = App\Models\Surveys\Form::min('id');
    $form_id_max = App\Models\Surveys\Form::max('id');
    $type_id_min = App\Models\Surveys\Type::min('id');
    $type_id_max = App\Models\Surveys\Type::max('id');
   
    return [
        'question_title'    => $faker->word,
        'question_number'   => 1,
        'image'             => 'imagesExample',
        'form_id'           => 1,
        'type_id'           => $faker->numberBetween($type_id_min,$type_id_max),
    ];
});
