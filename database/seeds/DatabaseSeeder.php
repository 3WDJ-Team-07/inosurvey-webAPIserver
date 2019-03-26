<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JobsTableSeed::class);
        $this->call(LocalsTableSeed::class);
        $this->call(UsersTableSeed::class);
        $this->call(WalletsTableSeed::class);
        $this->call(SurveyTopicsTableSeed::class);
        $this->call(SurveyTargetsTableSeed::class);
        $this->call(SurveyFormsTableSeed::class);
        $this->call(SurveyQuestionTypesTableSeed::class);
        $this->call(SurveyFormQuestionsTableSeed::class);
        $this->call(SurveyFormQuestionItemsTableSeed::class);
        $this->call(SurveiesUsersTableSeed::class);
        $this->call(SurveyResponsesTableSeed::class);
        $this->call(ItemsResponsesTableSeed::class);
    }
}
