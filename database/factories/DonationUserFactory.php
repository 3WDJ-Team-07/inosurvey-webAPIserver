<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Donations\DonationUser::class, function (Faker $faker) {
   
    $donation_id_min    = App\Models\Donations\Donation::min('id');
    $donation_id_max    = App\Models\Donations\Donation::max('id');
    $user_id_min        = App\Models\Users\User::min('id');
    $user_id_max        = App\Models\Users\User::max('id');
    

    return [
        
        'donation_id' => $faker->numberBetween($donation_id_min,$donation_id_max),       
        'sponsors_id' => $faker->numberBetween($user_id_min,$user_id_max),

    ];
});
