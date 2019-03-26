<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\User::class, function (Faker $faker) {
    $user_id = ['bogeun2012','pyc4411','pyc211','pyc2238','pyc3358'];
    $num = $faker->numberBetween(0,4);
    
    $job_id_min = App\Models\Job::min('id');
    $job_id_max = App\Models\Job::max('id');
    $local_id_min = App\Models\Local::min('id');
    $local_id_max = App\Models\Local::max('id');


    return [
        'user_id' => $user_id[$num] . $num,
        'password' => '$2y$10$92IXUNpkjO0r/igi', 
        'email' => $faker->unique()->safeEmail,
        'nickname' => $faker->name,       
        'gender' => rand(1,2),
        'age' => '10대',
        'job_id' => $faker->numberBetween($job_id_min,$job_id_max),
        'local_id' => $faker->numberBetween($local_id_min,$local_id_max),
        
    ];
});
