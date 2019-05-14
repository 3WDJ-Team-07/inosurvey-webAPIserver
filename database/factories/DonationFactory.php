<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Donations\Donation::class, function (Faker $faker) {
   
    $user_id_min = App\Models\Users\User::min('id');
    $user_id_max = App\Models\Users\User::max('id');
    

    return [
        'title'             => '가난한 아이가 꿈을 꿀 수 있게해주세요',
        'content'           => '자신의 방안에서 편히 쉴 수 있는 휴식 공간이 생길 수 있도록 여러분의 도움이 필요합니다.', 
        'image'             => 'http://inosurvey.s3-ap-northeast-2.amazonaws.com/donations/f964667c-6a86-4f0c-9cef-6bb5b4cf51fd캡처.JPG',
        'target_amount'     => 500000,
        'donator_id'        => 1,       
        'current_amount'    => 0,
        'closed_at'         => \Carbon\Carbon::now()->addWeek(1),

    ];
});
