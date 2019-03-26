<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Job::class, function (Faker $faker) {
    $job = ['guest','reporter','developer','owner','master'];
    $num = $faker->numberBetween(0,4);
    return [
        'name' => $job[$num] . $num,
    ];
});
