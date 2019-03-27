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
        $this->call(UsersTableSeed::class);
        $this->call(WalletsTableSeed::class);
        $this->call(TopicsTableSeed::class);
        $this->call(TargetsTableSeed::class);
        $this->call(FormsTableSeed::class);
        $this->call(TypesTableSeed::class);
        $this->call(QuestionsTableSeed::class);
        $this->call(QuestionItemsTableSeed::class);
        $this->call(SurveyUsersTableSeed::class);
        $this->call(ResponsesTableSeed::class);
        $this->call(ItemResponsesTableSeed::class);
    }
}
