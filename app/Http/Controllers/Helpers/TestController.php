<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Donations\Donation;


class TestController extends Controller
{
    private $donationModel          = null;

    public function __construct() {
        $this->donationModel        = new Donation();
    }

}
