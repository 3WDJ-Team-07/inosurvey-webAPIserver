<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Donations\Donation::class, function (Faker $faker) {
   
    $user_id_min = App\Models\Users\User::min('id');
    $user_id_max = App\Models\Users\User::max('id');
    

    return [
        'title' => $faker->word,
        'content' => $faker->text, 
        'image' => 'http://inosurvey.s3-ap-northeast-2.amazonaws.com/donations/f964667c-6a86-4f0c-9cef-6bb5b4cf51fd캡처.JPG',
        'target_amount' => 5000000,
        'donator_id' => $faker->numberBetween($user_id_min,$user_id_max),       
        'current_amount' => 0,
        'closed_at' => Carbon\Carbon::now(),

    ];
});
