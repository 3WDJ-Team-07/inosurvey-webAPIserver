<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Donations\Donation::class, function (Faker $faker) {
   
    $user_id_min = App\Models\Users\User::min('id');
    $user_id_max = App\Models\Users\User::max('id');
    

    return [
        'title' => $faker->word,
        'content' => $faker->text, 
        'image' => 'Example Image',
        'target_amount' => 5000000,
        'donator_id' => $faker->numberBetween($user_id_min,$user_id_max),       
        'current_amount' => rand(23331,412412),
        'closed_at' => Carbon\Carbon::now(),

    ];
});
