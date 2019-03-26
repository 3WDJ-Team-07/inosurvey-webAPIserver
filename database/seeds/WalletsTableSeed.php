<?php

use Illuminate\Database\Seeder;

class WalletsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Wallet::class,1)->create();
    }
}
