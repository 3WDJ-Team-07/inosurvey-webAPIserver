<?php

namespace App\Http\Controllers\Donations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\StoreImage;
use App\Http\Controllers\Helpers\ConstantEnum;
use Auth;

use App\Models\Donations\Donation;

class DonationController extends Controller
{
    use StoreImage;

    public function index(){
        if(Donation::all()) {
            return Donation::all();
        }else {
            return response()->json(['message'=>'false'],400);
        }
    }



    public function create(Request $request){
  
        $file = $this->fileUpload($request,ConstantEnum::S3['donations']);

        if($file == false){
           return response()->json(['message'=>'false'],400);
        }

        $param = array(
            'title'         =>  $request->title,
            'content'       =>  $request->content,
            'image'         =>  $file,
            'target_amount' =>  $request->target_amount,
            'closed_at'     =>  $request->closed_at,
            'donator_id'    =>  1,
        );

        Donation::create($param);

       return response()->json(['message'=>'true'],201);
    
    }

    



}
