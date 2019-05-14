<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Surveies\Form::class, function (Faker $faker) {
    
    $target_id_min  = App\Models\Surveies\Target::min('id');
    $target_id_max  = App\Models\Surveies\Target::max('id');
    $user_id_min    = App\Models\Users\User::min('id');
    $user_id_max    = App\Models\Users\User::max('id');
    
    return [
        'title'                 => '평소 식습관에 대한 설문 조사 ',
        'description'           => '최근 노로바이러스가 전세계적으로 유행하고 있습니다. 얼마전 일본 도쿄에서는 편의점 아르바이트생들이 단체로 복통을 호소하는 사건이 발생했습니다.', 
        // 'closed_at'          => '',  
        // 'is_sale'            => '', 
        'closed_at'             => \Carbon\Carbon::now()->addWeek(1), 
        'respondent_number'     => 100,
        'target_id'             => $faker->numberBetween($target_id_min,$target_id_max),
        'user_id'               => 1,
    ];
});
