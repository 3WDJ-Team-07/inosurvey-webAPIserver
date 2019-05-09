<?php

use Illuminate\Database\Seeder;
use App\Models\Users\Job;

class JobsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Models\Users\Job::class,9)->create();

        $jobs = array(
    
            array('name' => '교육'),
            array('name' => '건설'),
            array('name' => '금융 / 무역'),
            array('name' => '사무 / 경영'),
            array('name' => '생산 / 제조'),
            array('name' => '서비스 / 상담'),
            array('name' => '연구 / 개발'),
            array('name' => '예술 / 방송'),
            array('name' => 'IT / 인터넷'),
            );
        
        
            foreach($jobs as $rs){ 
                Job::insert($rs);
             } 
    }
}
