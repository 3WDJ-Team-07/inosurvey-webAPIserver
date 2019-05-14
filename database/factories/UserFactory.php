<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Users\User::class, function (Faker $faker) {
    $name = ['박보근','추호진','정준우','김민영','류정은','김현성','김은광','김승연','윤건희','이상진','류정훈','곽민수'];
    $num = $faker->numberBetween(0,11);
    
    $job_id_min = App\Models\Users\Job::min('id');
    $job_id_max = App\Models\Users\Job::max('id');
    

    return [
        // 'user_id' => $user_id[$num] . $num,
        'user_id'   => 'ino'.rand(0,50),
        'password'  => '123456', 
        'email'     => $faker->unique()->safeEmail,
        'nickname'  => $name[$num],       
        'gender'    => rand(1,2),
        'age'       => rand(1945,2005),
        'job_id'    => $faker->numberBetween($job_id_min,$job_id_max),
    ];
});
