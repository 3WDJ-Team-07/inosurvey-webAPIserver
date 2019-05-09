<?php

namespace App\Http\Controllers\Donations;
/**
 * 클래스명:                       DonationController
 * @package                       App\Http\Controllers\Donations
 * 클래스 설명:                    기부단체 생성 및 기부기능을 담당하는 클래스
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                        2019년 4월 10일
 *
 * 함수 목록
 * create(단체정보)  :              기부 단체 생성
 * donate(기부자,기부단체,이노)  :   특정 기부단체에 기부하기
 */
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

        $this->donationModel->create($param);

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


        $donation = $this->donationModel->where('id',$request->donation_id)->first();

        //기부 완료 및 기부 마감 검증
        $now = Carbon::now()->format('Y-m-d H:i:s');    //현재시간
        $closedAt = $donation->closed_at;               //기부 마감시간

        if($donation->current_amount >= $donation->target_amount || strtotime($now) >= strtotime($closedAt)){
            return response()->json(['message'=>'This is a closed donation organization.'], 202);
        }

        //목표 금액에 달성 되어있지 않은 경우
        if($donation->current_amount < $donation->target_amount){
            $this->donationModel->achieveAmount($request->donation_id,$request->ino);
        }


        $donationUserData = array(
            'donation_id'       => $request->donation_id,
            'sponsors_id'       => $request->user_id,
            'donation_amount'   => $request->ino,
        );

      
        $this->donationUserModel->create($donationUserData);          //기부자 리스트 추가

        $payload = array( 
            'form_params' => [
                'user_id'       =>  $request->user_id,
                'donation_id'   =>  $request->donation_id,
                'ino'           =>  $request->ino,
            ]
        );
        
        
        $response = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['donate']);     //기부 금액 결제     
         
        //요청 실패
         if($response['status'] != 200){
            return response()->json(['message'=>'Failed to make donation to the organization'], 401);
        }

        return response()->json(['message'=>'true'],200);
    }

}
