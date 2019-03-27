<?php

use Illuminate\Database\Seeder;

class TopicsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveies\Topic::class,6)->create();
    }
}
