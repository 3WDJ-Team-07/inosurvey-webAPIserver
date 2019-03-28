<?php

use Illuminate\Database\Seeder;

class DonationTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Donations\Donation::class,5)->create();
    }
}
