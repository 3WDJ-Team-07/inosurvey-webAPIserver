<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\ItemResponse::class, function (Faker $faker) {
    
    $response_id_min = App\Models\Surveies\Response::min('id');
    $response_id_max = App\Models\Surveies\Response::max('id');
    $item_id_min = App\Models\Surveies\QuestionItem::min('id');
    $item_id_max = App\Models\Surveies\QuestionItem::max('id');
    return [
        'response_id' =>  $faker->numberBetween($response_id_min,$response_id_max),
        'item_id' =>  $faker->numberBetween($item_id_min,$item_id_max),
    ];

});
