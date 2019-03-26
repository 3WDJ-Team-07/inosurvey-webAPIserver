<?php

use Illuminate\Database\Seeder;

class SurveyTargetsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SurveyTarget::class,5)->create();
    }
}
