<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\Topic::class, function (Faker $faker) {
    $topic = ['교육','문화/여가','경제','제품','생활','기타'];
    $num = $faker->numberBetween(0,5);
    return [
        'topic' => $topic[$num],
    ];
});
