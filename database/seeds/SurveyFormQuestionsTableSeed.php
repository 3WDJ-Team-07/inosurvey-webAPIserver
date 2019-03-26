<?php

use Illuminate\Database\Seeder;

class SurveyFormQuestionsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SurveyFormQuestion::class,5)->create();
    }
}
