<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\QuestionItem::class, function (Faker $faker) {
    $question_id_min = App\Models\Surveies\Question::min('id');
    $question_id_max = App\Models\Surveies\Question::max('id');
    return [
        'content' => $faker->word,
        'content_number' => 1,
        'content_image' =>'exampleImages',
        'question_id' =>  1
    ];
});
