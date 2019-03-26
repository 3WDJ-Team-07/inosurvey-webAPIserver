<?php

use Illuminate\Database\Seeder;

class SurveiesUsersTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\SurveyUser::class,20)->create();
    }
}
