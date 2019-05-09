<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\Form::class, function (Faker $faker) {
    $target_id_min = App\Models\Surveies\Target::min('id');
    $target_id_max = App\Models\Surveies\Target::max('id');
    $user_id_min = App\Models\Users\User::min('id');
    $user_id_max = App\Models\Users\User::max('id');
    return [
        'title' => $faker->word,
        'description' => $faker->text, 
        // 'closed_at' => '',  
        // 'is_sale' => '', 
        'closed_at' => \Carbon\Carbon::now()->addWeek(1), 
        'respondent_number' => 100,
        'target_id' => $faker->numberBetween($target_id_min,$target_id_max),
        'user_id' => 1,
    ];
});
