<?php

use Illuminate\Database\Seeder;

class SurveyTopicsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SurveyTopic::class,6)->create();
    }
}
