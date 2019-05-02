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
        factory(App\Models\Surveies\ReplyableUser::class,3)->create();
    }
}
