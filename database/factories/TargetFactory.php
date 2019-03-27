<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\Target::class, function (Faker $faker) {
    $job_id_min = App\Models\Users\Job::min('id');
    $job_id_max = App\Models\Users\Job::max('id');
   
    
    return [
        
        'start_age' => 10,
        'end_age' => 49,
        'gender' => rand(1,2),
        'job_id' => $faker->numberBetween($job_id_min,$job_id_max),
        
    ];
});
