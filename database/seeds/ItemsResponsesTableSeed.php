<?php

use Illuminate\Database\Seeder;

class ItemsResponsesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\ItemResponse::class,10)->create();
    }
}
