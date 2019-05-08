<?php

namespace App\Http\Controllers\Donations;
/**
 * 클래스명:                       ListController
 * @package                       App\Http\Controllers\Donations
 * 클래스 설명:                    기부 관련 리스트를 조회하는 클래스
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근 1701037 김민영
 * 만든날:                        2019년 5월 1일
 *
 * 함수 목록
 * index() :                       기부 리스트 조회
 * show(기부아이디)  :              특정 기부단체 정보 조회
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Donations\Donation;
use App\Models\Donations\DonationUser;

class ListController extends Controller
{
    private $donationModel      = null;
    private $donationUserModel  = null;

    function __construct(){
        $this->donationModel       = new Donation();
        $this->donationUserModel   = new DonationUser();
    }


    //기부단체 리스트
    public function index(){
        if(Donation::all()) {
            return response()->json(['message'=>'true','donation'=>Donation::all()],200);
        }else {
            return response()->json(['message'=>'false'],400);
        }
    }


    //기부단체 정보
    public function show(Request $request){
        
        $donations = $this->donationModel->donorList('id',$request->id)->first();

        return response()->json(['message'=>'true','donations'=>$donations],200);
    }
}




