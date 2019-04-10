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

    public function test(){
        // return $this::LOGIN_TYPE['type'];
        return $this->getGuzzleRequest('GET','/test/asd');
    }

    public function json(Request $request){
        $id = $request->donation_id;
        $value = $this->donationModel->where('id', $id)->first();
        
        if($id){
            return response()->json(['message' => 'true' , 'value' => $value],200);
        }else{
            return response()->json(['message' => 'false'],401);

        }
    }
    public function selectUser(Request $request){
        $id = $request->id;
        $name = $this->donationModel->sponsorsName($id);
        return response()->json(['name'=>$name]);
    }

}
