<?php

namespace App\Exports;

use App\Models\Users\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class TestExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }
}
