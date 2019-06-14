<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    $question_id_min    = App\Models\Surveys\Question::min('id');
    $question_id_max    = App\Models\Surveys\Question::max('id');
    $item_id_min        = App\Models\Surveys\QuestionItem::min('id');
    $item_id_max        = App\Models\Surveys\QuestionItem::max('id');
    
    return [
        'question_id'    => $faker->numberBetween($question_id_min,$question_id_max),
        'item_id'        => $faker->numberBetween($item_id_min,$item_id_max),
    ];
});
