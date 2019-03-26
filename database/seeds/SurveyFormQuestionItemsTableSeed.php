<?php

use Illuminate\Database\Seeder;

class SurveyFormQuestionItemsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SurveyFormQuestionItem::class,5)->create();
    }
}
