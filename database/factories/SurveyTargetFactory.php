<?php

use Faker\Generator as Faker;

$factory->define(App\Models\SurveyTarget::class, function (Faker $faker) {
    $job_id_min = App\Models\Job::min('id');
    $job_id_max = App\Models\Job::max('id');
    $local_id_min = App\Models\Local::min('id');
    $local_id_max = App\Models\Local::max('id');
    
    return [
        'start_age' => '10대',
        'end_age' => '30대',
        'gender' => rand(0,1),
        'job_id' => $faker->numberBetween($job_id_min,$job_id_max),
        'local_id' =>  $faker->numberBetween($local_id_min,$local_id_max)
    ];
});
