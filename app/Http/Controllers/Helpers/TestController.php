<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Helpers\Guzzles;
use App\Http\Controllers\Helpers\ConstantEnum;
use App\Models\Users\User;
use Webpatser\Uuid\Uuid;
class TestController extends Controller
{
    use Guzzles;
 
    public function test(){
        $host = config('constants.ethereum_host');
        $port = config('constants.ethereum_port');
        
        return url($host,$port);

        return $host.':'.$port.'/';
        return 'asd';
        return  $file = $request->file('image')->getClientOriginalName();
      
        
        

        // return require('C:\xampp\htdocs\InoSurvey\question_bank.json');
        $result = collect($this->getGuzzleRequest('GET','wallet/create'));
        return $result->public_key;
        return response()->json(['message'=>'false'],400);
        return config('filesystems.disks.s3.url').'/'.ConstantEnum::S3['donations'].'/'.'umr.jpg';
        return ConstantEnum::LOGIN_TYPE['type'];
        return config('filesystems.disks.s3.url').'/donations/umr.jpg';
        // return $this::LOGIN_TYPE['type'];
        return $this->getGuzzleRequest('GET','/test/asd');

    }

   

    public function arrayTest(Request $request){
        $a = '가';
        $b = '나';
        $c = $a.$b;
        return $c;

        return (String)Uuid::generate(4);
        return $uuid;
        // return config('filesystems.disks.s3.url').'/'.ConstantEnum::S3['donations'].'/'.'umr.jpg';
    }
}
