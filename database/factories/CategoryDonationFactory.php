<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Donations\CategoryDonation::class, function (Faker $faker) {
    $donation_id_min = App\Models\Donations\Donation::min('id');
    $donation_id_max = App\Models\Donations\Donation::max('id');
    $category_id_min = App\Models\Donations\Category::min('id');
    $category_id_max = App\Models\Donations\Category::max('id');
    
    return [
        'donation_id' => $faker->numberBetween($donation_id_min,$donation_id_max),
        'category_id' => $faker->numberBetween($category_id_min,$category_id_max),
    ];
});
