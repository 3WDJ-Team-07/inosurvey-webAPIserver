<?php

use Illuminate\Database\Seeder;

class SurveyUsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveies\SurveyUser::class,10)->create();

    }
}
