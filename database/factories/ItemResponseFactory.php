<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveys\ItemResponse::class, function (Faker $faker) {
    
    $response_id_min    = App\Models\Surveys\Response::min('id');
    $response_id_max    = App\Models\Surveys\Response::max('id');
    $item_id_min        = App\Models\Surveys\QuestionItem::min('id');
    $item_id_max        = App\Models\Surveys\QuestionItem::max('id');
    return [
        'response_id'   =>  $faker->numberBetween($response_id_min,$response_id_max),
        'item_id'       =>  $faker->numberBetween($item_id_min,$item_id_max),
    ];

});
