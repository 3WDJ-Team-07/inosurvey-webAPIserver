<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveys\Target::class, function (Faker $faker) {
    $age = array( 10, 20 );
    
    return [
        'age'       => $age,
        'gender'    => rand(0,2),
    ];
});
