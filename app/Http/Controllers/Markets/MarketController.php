<?php

namespace App\Http\Controllers\Markets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Surveies\Form;

class MarketController extends Controller
{

    private $formModel = null;

    function __construct(){
        $this->formModel = new Form();
    }
    
}
