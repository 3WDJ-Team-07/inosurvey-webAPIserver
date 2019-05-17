<?php

use Illuminate\Database\Seeder;

class JobTargetTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveys\JobTarget::class,1)->create();
    }
}
