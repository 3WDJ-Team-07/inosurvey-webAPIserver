<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\GuzzleController;
use App\Http\Controllers\Helpers\ConstantEnum;

class TestController extends Controller
{

    
    function __construct(){
        $this->Guzzle = new GuzzleController();
    }

    public function test(){
        return response()->json(['message'=>'false'],400);
        return config('filesystems.disks.s3.url').'/'.ConstantEnum::S3['donations'].'/'.'umr.jpg';
        return ConstantEnum::LOGIN_TYPE['type'];
        return config('filesystems.disks.s3.url').'/donations/umr.jpg';
        // return $this::LOGIN_TYPE['type'];
        return $this->getGuzzleRequest('GET','/test/asd');
    }

    // public function arrayTest(Request $request){
    //   $array = array([        
    //             'id'=>1,
    //             'type'=>null,
    //         ]);
    //     $array[0]['type'] = $request->type;   
    //     return response()->json(['questions' => $array],201);
    // }
}
