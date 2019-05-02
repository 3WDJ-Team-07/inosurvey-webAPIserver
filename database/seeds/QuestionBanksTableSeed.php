<?php

use Illuminate\Database\Seeder;

class QuestionBanksTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveies\QuestionBank::class,3)->create();
    }
}
