<?php

use Illuminate\Database\Seeder;

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
    }
}
