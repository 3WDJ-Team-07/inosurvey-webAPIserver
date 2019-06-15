<?php

use Illuminate\Database\Seeder;
use App\Models\Donations\Category;
class CategoryTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array(
    
            array('name' => '아동 / 청소년'),
            array('name' => '어르신'),
            array('name' => '장애인'),
            // array('name' => '다문화'),
            array('name' => '지구촌'),
            array('name' => '가족 / 여성'),
            array('name' => '시민사회'),
            // array('name' => '동물'),
            array('name' => '동식물'),
            array('name' => '기타'),
            
        );
        
            foreach($categories as $rs){ 
                Category::insert($rs);
             } 
    }
}
