<?php

use Illuminate\Database\Seeder;

class TargetsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveys\Target::class,5)->create();
    }
}
