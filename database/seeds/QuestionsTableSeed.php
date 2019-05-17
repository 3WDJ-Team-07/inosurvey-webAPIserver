<?php

use Illuminate\Database\Seeder;

class QuestionsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveys\Question::class,1)->create();
    }
}
