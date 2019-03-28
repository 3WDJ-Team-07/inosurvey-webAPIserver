<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\ReplyableUser::class, function (Faker $faker) {
    $survey_id_min = App\Models\Surveies\Form::min('id');
    $survey_id_max = App\Models\Surveies\Form::max('id');
    $replyable_id_min = App\Models\Users\User::min('id');
    $replyable_id_max = App\Models\Users\User::max('id');
    
    return [
        'survey_id' => $faker->numberBetween($survey_id_min,$survey_id_max),
        'replyable_id' => $faker->numberBetween($replyable_id_min,$replyable_id_max),
    ];
});
