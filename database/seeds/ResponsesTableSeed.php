<?php

use Illuminate\Database\Seeder;

class ResponsesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveys\Response::class,1)->create();
    }
}
