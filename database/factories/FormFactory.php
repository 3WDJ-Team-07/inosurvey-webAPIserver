<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\Form::class, function (Faker $faker) {
    $donation_id_min = App\Models\Donations\Donation::min('id');
    $donation_id_max = App\Models\Donations\Donation::max('id');
    $topic_id_min = App\Models\Surveies\Topic::min('id');
    $topic_id_max = App\Models\Surveies\Topic::max('id');
    $target_id_min = App\Models\Surveies\Target::min('id');
    $target_id_max = App\Models\Surveies\Target::max('id');
    return [
        'title' => $faker->word,
        'description' => $faker->text, 
        // 'closed_at' => '',  
        // 'is_sale' => '', 
        // 'donation_organization' => $faker->word, 
        'respondent_number' => rand(1,200),
        'donation_id' => $faker->numberBetween($donation_id_min,$donation_id_max),
        'topic_id' => $faker->numberBetween($topic_id_min,$topic_id_max),
        'target_id' => $faker->numberBetween($target_id_min,$target_id_max),
    ];
});
