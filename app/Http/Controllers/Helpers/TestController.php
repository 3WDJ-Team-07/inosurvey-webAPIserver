<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class TestController extends Controller
{

    public function test(){
        // return $this::LOGIN_TYPE['type'];
        return $this->getGuzzleRequest('GET','/test/asd');
    }

}
