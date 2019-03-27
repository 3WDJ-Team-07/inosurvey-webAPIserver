<?php

use Illuminate\Database\Seeder;

class JobsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Users\Job::class,10)->create();
    }
}
