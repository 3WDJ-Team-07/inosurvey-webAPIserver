<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Local::class, function (Faker $faker) {
    $local = ['seoul','wonju','deagu','busan','fukuoka'];
    $num = $faker->numberBetween(0,4);
    return [
        'name' => $local[$num] . $num,
    ];
});
