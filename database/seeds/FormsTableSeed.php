<?php

use Illuminate\Database\Seeder;

class FormsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Surveys\Form::class,1)->create();
    }
}
