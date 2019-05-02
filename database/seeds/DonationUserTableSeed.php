<?php

use Illuminate\Database\Seeder;

class DonationUserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Donations\DonationUser::class,1)->create();
    }
}
