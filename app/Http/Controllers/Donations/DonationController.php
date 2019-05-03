<?php

namespace App\Http\Controllers\Donations;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\Guzzles;
use App\Http\Controllers\Helpers\StoreImage;
use App\Http\Controllers\Helpers\ConstantEnum;
use Carbon\Carbon;

use App\Models\Donations\Donation;
use App\Models\Donations\DonationUser;

class DonationController extends Controller
{
    use StoreImage, Guzzles;

    private $donationModel = null;
    private $donationUserModel = null;

    function __construct(){
        $this->donationModel        = new Donation();
        $this->donationUserModel    = new DonationUser();
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
            'donator_id'    =>  $request->user_id,
        );

        Donation::create($param);

        $closedAt = new Carbon($request->closed_at);
                                  
        $payload = array( 
            'form_params' => [
                'user_id'           =>  $request->user_id,
                'maximumAmount'     =>  $request->target_amount,
                'closedAt'          =>  $closedAt->timestamp,
            ]
        );
        
        $response = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['establishment']);
         
        //요청 실패
         if($response['status'] != 200){
            return response()->json(['message'=>'Donor group registration failed'], 401);
        }


       return response()->json(['message'=>'true'],200);
    
    }


    //기부단체 기부하기
    public function donate(Request $request){

        $donationUserData = array(
            'donation_id'       => $request->donation_id,
            'sponsors_id'       => $request->user_id,
            'donation_amount'   => $request->ino,
        );

        $this->donationUserModel->create($donationUserData);

        $payload = array( 
            'form_params' => [
                'user_id'       =>  $request->user_id,
                'donation_id'   =>  $request->donation_id,
                'ino'           =>  $request->ino,
            ]
        );
        
        $response = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['donate']);
         
        //요청 실패
         if($response['status'] != 200){
            return response()->json(['message'=>'Failed to make donation to the organization'], 401);
        }


        $donation = $this->donationModel->where('id',$request->donation_id)->first();

        //목표 금액에 달성 되어있지 않은 경우
        if($donation->current_amount < $donation->target_amount){
            $this->donationModel->achieveAmount($request->donation_id,$request->ino);
        }
        
        return response()->json(['message'=>'true'],200);
    }

}
