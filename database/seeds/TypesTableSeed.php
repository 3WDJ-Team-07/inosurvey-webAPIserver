<?php

use Illuminate\Database\Seeder;
use App\Models\Surveies\Type;
class TypesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveies\Type::class,6)->create();
        // $type = ['주관식','객관식','확인란','별등급','이미지선택','의견란'];
        
        // for($i = 0 ; $i < count($type) ; $i++) {
        //     Type::create($type[$i]);
        // } 
        // // foreach($type as $item){
        // //     Type::insert($item);
        // // }
    }
}
