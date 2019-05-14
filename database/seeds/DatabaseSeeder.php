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
        // $this->call(DonationTableSeed::class);
        $this->call(WalletsTableSeed::class);
        // $this->call(TargetsTableSeed::class);
        // $this->call(FormsTableSeed::class);
        $this->call(TypesTableSeed::class);
        // $this->call(QuestionsTableSeed::class);
        // $this->call(QuestionItemsTableSeed::class);
        // $this->call(SurveyUsersTableSeed::class);
        // $this->call(ResponsesTableSeed::class);

        // // $this->call(ItemResponsesTableSeed::class);
        // // $this->call(DonationUserTableSeed::class);

        // $this->call(ReplyableUserTableSeed::class);
        $this->call(QuestionBanksTableSeed::class);
        // $this->call(JobTargetTableSeed::class);
    }
}
