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

    public function arrayTest(Request $request){
      $array = array([        
                'id'=>1,
                'type'=>null,
            ]);
        $array[0]['type'] = $request->type;   
        return response()->json(['questions' => $array],201);
    }
}
