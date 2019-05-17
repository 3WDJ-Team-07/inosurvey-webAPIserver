<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveys\JobTarget::class, function (Faker $faker) {
    $job_id_min     = App\Models\Users\Job::min('id');
    $job_id_max     = App\Models\Users\Job::max('id');
    $target_id_min  = App\Models\Surveys\Target::min('id');
    $target_id_max  = App\Models\Surveys\Target::max('id');
    
    return [
        'job_id'    => $faker->numberBetween($job_id_min,$job_id_max),
        'target_id' => $faker->numberBetween($target_id_min,$target_id_max),
    ];
});
