<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Users\Wallet::class, function (Faker $faker) {
    $user_id_min = App\Models\Users\User::min('id');
    $user_id_max = App\Models\Users\User::max('id');
    return [
        'user_id'       => $faker->numberBetween($user_id_min,$user_id_max),
        'public_key'    => '$2y$10$92IXUNqweqwebyMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'private_key'   => '$2y$10$92qweqwewebyMi.Ye4oKoEa3Ro9llC/.og/at2.uhasd/igi',
    ];
});
