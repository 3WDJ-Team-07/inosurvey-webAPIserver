<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Users\User::class, function (Faker $faker) {
    $user_id = ['bogeun2012','pyc4411','pyc211','pyc2238','pyc3358'];
    $num = $faker->numberBetween(0,4);
    
    $job_id_min = App\Models\Users\Job::min('id');
    $job_id_max = App\Models\Users\Job::max('id');
    

    return [
        // 'user_id' => $user_id[$num] . $num,
        'user_id' => 'ino'.rand(0,50),
        'password' => '123456', 
        'email' => $faker->unique()->safeEmail,
        'nickname' => $faker->name,       
        'gender' => rand(1,2),
        'age' => rand(1945,2005),
        'job_id' => $faker->numberBetween($job_id_min,$job_id_max),
    ];
});
