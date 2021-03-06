<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveys\Type::class, function (Faker $faker) {
    $type = ['주관식','객관식','확인란','별등급','이미지선택','의견란','사전질문'];
    $num = $faker->numberBetween(0,6);
    return [
        'type' => $type[$num],
    ];
});
