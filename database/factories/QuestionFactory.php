<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\Question::class, function (Faker $faker) {
    $form_id_min = App\Models\Surveies\Form::min('id');
    $form_id_max = App\Models\Surveies\Form::max('id');
    $type_id_min = App\Models\Surveies\Type::min('id');
    $type_id_max = App\Models\Surveies\Type::max('id');
   
    return [
        'question_title' => $faker->word,
        'question_number' => 1,
        'image' => 'imagesExample',
        'form_id' => $faker->numberBetween($form_id_min,$form_id_max),
        'type_id' => $faker->numberBetween($type_id_min,$type_id_max),
    ];
});
