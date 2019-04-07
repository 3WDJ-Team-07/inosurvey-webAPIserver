<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Helpers\GuzzleController;

class TestController extends Controller
{
    private $translation    = null;
    public function __construct(){
        
        $this->translation = new GuzzleController();
        
    }

    public function test(){
        return $this->translation->getGuzzleRequest('GET','/test/get');
    }

}
