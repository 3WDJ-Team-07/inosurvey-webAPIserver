<?php

use Illuminate\Database\Seeder;

class LocalsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Local::class,10)->create();
    }
}
