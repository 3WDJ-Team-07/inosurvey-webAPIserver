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
        factory(App\Models\Surveies\JobTarget::class,1)->create();
    }
}
