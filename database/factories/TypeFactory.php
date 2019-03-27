<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\Type::class, function (Faker $faker) {
    $type = ['순위형','주관식','객관식','별등급','확인란','의견란','이미지선택'];
    $num = $faker->numberBetween(0,6);
    return [
        'type' => $type[$num],
    ];
});
