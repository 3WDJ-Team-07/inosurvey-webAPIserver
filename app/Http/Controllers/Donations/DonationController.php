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

    private $donationModel = null;

    function __construct(){
        $this->donationModel = new Donation();
    }

    //기부단체 리스트
    public function index(){
        if(Donation::all()) {
            return response()->json(['message'=>'true','donation'=>Donation::all()],200);
        }else {
            return response()->json(['message'=>'false'],400);
        }
    }


    //기부단체 등록
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

       return response()->json(['message'=>'true'],200);
    
    }


      //기부단체 정보
      public function show(Request $request){
    
        $donations = $this->donationModel->getData('id',$request->id)->first();

        return response()->json(['message'=>'true','donations'=>$donations],200);
    }

    //기부자 아이디, 기부단체 아이디, ino
    public function donate(Request $request){
        return $request;
        
    }

}
