<?php

use Illuminate\Database\Seeder;

class ReplyableUserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveys\ReplyableUser::class,1)->create();
    }
}
