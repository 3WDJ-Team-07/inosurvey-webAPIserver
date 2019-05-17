<?php

use Illuminate\Database\Seeder;

class CategoryDonationTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Donations\CategoryDonation::class,1)->create();
    }
}
