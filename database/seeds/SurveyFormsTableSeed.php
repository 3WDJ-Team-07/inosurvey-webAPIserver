<?php

use Illuminate\Database\Seeder;

class SurveyFormsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SurveyForm::class,10)->create();
    }
}
