<?php

use Illuminate\Database\Seeder;

class QuestionItemsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveies\QuestionItem::class,5)->create();
    }
}
