<?php

use Illuminate\Database\Seeder;
use App\Models\Surveys\Type;
class TypesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Models\Surveies\Type::class,6)->create();
        $type = array(
        
            array('type' => '객관식'),
            array('type' => '주관식'),
            array('type' => '확인란'),
            array('type' => '별등급'),
            array('type' => '의견란'),
            array('type' => '이미지선택'),
        
        );
        
        foreach($type as $rs){ 
            Type::insert($rs);
         } 
        
    }
}
