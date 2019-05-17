<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveys\ReplyableUser::class, function (Faker $faker) {
    $survey_id_min      = App\Models\Surveys\Form::min('id');
    $survey_id_max      = App\Models\Surveys\Form::max('id');
    $replyable_id_min   = App\Models\Users\User::min('id');
    $replyable_id_max   = App\Models\Users\User::max('id');
    
    return [
        'survey_id'     => 1,
        'replyable_id'  => 2,
    ];
});
