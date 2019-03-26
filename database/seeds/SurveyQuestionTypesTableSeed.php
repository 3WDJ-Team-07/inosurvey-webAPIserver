<?php

use Illuminate\Database\Seeder;

class SurveyQuestionTypesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SurveyQuestionType::class,6)->create();
    }
}
