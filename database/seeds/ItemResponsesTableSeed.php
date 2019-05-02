<?php

use Illuminate\Database\Seeder;

class ItemResponsesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveies\ItemResponse::class,1)->create();
    }
}
