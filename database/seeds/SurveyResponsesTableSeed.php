<?php

use Illuminate\Database\Seeder;

class SurveyResponsesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SurveyResponse::class,5)->create();
    }
}
