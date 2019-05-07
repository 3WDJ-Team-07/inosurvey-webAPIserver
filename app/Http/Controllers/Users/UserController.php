<?php

namespace App\Http\Controllers\Users;
/**
 * 클래스명:                     UserController
 * @package                     App\Http\Controllers\Users
 * 클래스 설명:                 토큰값을 체크하고 유저 관련 함수를 담당하는 컨트로러
 * 만든이:                      3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                      2019년 4월 16일
 *
 * 함수 목록
 * check(회원정보):             유저의 토큰값을 검증하고 DB의 유저정보를 반환  
 * getWallet(회원 아이디)       회원의 지갑을 조회하는 함수
 * isSale(설문 아이디)          자신의 설문조사를 판매하는 함수
 */

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Http\Controllers\Helpers\ConstantEnum;
use App\Http\Controllers\Helpers\Guzzles;
use \Firebase\JWT\JWT;
use Carbon\Carbon;
use Auth;

use App\Models\Users\User;
use App\Models\Surveies\Form;
use App\models\Donations\Donation;

class UserController extends Controller
{
    use Guzzles;

    private $userModel = null;
    private $formModel = null;

    function __construct(){
        $this->userModel = new User();
        $this->formModel = new Form();
        $this->donationModel = new Donation();
    }


    public function check(Request $request){
      
        $key = ConstantEnum::JWT_KEY['key']; 
        $jwt = $request->access_token;

        try {
            $user = (array) JWT::decode($jwt, $key, array('HS256'));                         //decode후  Array로 캐스팅
            
            if($user['user']) {
                $userData = $this->userModel->where('id',$user['user'])->first();           //토큰의 정보와 일치하는 유저 정보를 추출
                return response()->json(['message'=>'true', 'user'=>$userData], 200);
            }else {
                return response()->json(['message'=>'false'], 400);
            }
        } catch (\Throwable $th) {
            return response()->json(['message'=>'false'], 400);
        }
    }//end of check


    //내가 만든 설문조사
    public function userSurveies(Request $request){
        
        $serveies = $this->formModel->getSurveies()->where('user_id',$request->id)->get();

        return response()->json(['message'=>'true','serveies'=>$serveies],200);
    }


    //유저 지갑 조회
    public function getWallet(Request $request){
        
        $payload = array( 
                        'form_params' => [
                            'user_id' => $request->id,
                        ]
                    );
                    
        $response = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['wallet']);
        

        $current = $response['body'][ConstantEnum::ETHEREUM['amount']];
        
        // $total = $result[ConstantEnum::ETHEREUM['totalAmount']];
        $total = "12213125152";   

        return response()->json([
            'message'       => 'true',
            'current_ino'   => $current,
            'total_ino'     => $total,
        ],200);
    }
    
    // 전체 내역
    public function getReceipt(Request $request, $range, $method = null){
        $payload = array( 
            'form_params' => [
                'user_id' => $request->id,
            ]
        );

        if($range == "all") {
            $response = $this->postGuzzleRequest($payload, ConstantEnum::NODE_JS['all_receipt']);
        }else if($range == "survey") {
            switch ($method) {
                case 'request':
                    $response = $this->postGuzzleRequest($payload, ConstantEnum::NODE_JS['survey_request_receipt']);
                    break;
                case 'response':
                    $response = $this->postGuzzleRequest($payload, ConstantEnum::NODE_JS['survey_response_receipt']);
                    break;
                case 'buy':
                    $response = $this->postGuzzleRequest($payload, ConstantEnum::NODE_JS['survey_buy_receipt']);
                    break;
                case 'sell':
                    $response = $this->postGuzzleRequest($payload, ConstantEnum::NODE_JS['survey_sell_receipt']);
                    break;
                default:
                    return response()->json(['message'=>'false'], 401);
                    break;
            }
        }else if($range == 'donation') {
            switch ($method) {
                case 'request':
                    $response = $this->postGuzzleRequest($payload, ConstantEnum::NODE_JS['donation_request_receipt']);
                    break;
                case 'donate':
                    $response = $this->postGuzzleRequest($payload, ConstantEnum::NODE_JS['donation_donate_receipt']);
                    break;
                default:
                    return response()->json(['message'=>'false'], 401);
                    break;
            }
        }else {
            return response()->json(['message'=>'false'], 404);
        }
        
        if($response['status'] != 200) {
            return response()->json(['message'=>'false'], 404);
        }

        $result = collect();
        
        foreach ($response['body'] as $item) {
            $date = Carbon::createFromTimestamp($item['date'])->format('Y-m-d H:i:s');
            $title = "";
            $method = "";
            $form_id = $item['obj_id'];
            $content = "";
            $sign = "";
            $value = $item['value'];

            if($item['title'] == ConstantEnum::RECEIPT_TITLE['survey']) {
                $form = $this->formModel->where('id', $item['obj_id'])->first();
                $title = "설문조사";
                $content = $form['title'];
                if($item['method'] == ConstantEnum::RECEIPT_METHOD['request']) {
                    $method = "요청";
                    $sign = "-";
                }else if($item['method'] == ConstantEnum::RECEIPT_METHOD['response']) {
                    $method = '응답';
                    $sign = "+";
                }else if($item['method'] == ConstantEnum::RECEIPT_METHOD['buy']) {
                    $method = '구매';
                    $sign = "-";
                }else if($item['method'] == ConstantEnum::RECEIPT_METHOD['sell']) {
                    $method = '판매';
                    $sign = "+";
                }else if($item['method'] == ConstantEnum::RECEIPT_METHOD['reward']) {
                    $method = '응답 보상';
                    $sign = "+";
                }else {
                    return response()->json(['message'=>'false'], 401);
                }
            }else if($item['title']  == ConstantEnum::RECEIPT_TITLE['foundation']) {
                $donation = $this->donationModel->where('id', $item['obj_id'])->first();
                $title = "기부단체";
                $content = $donation['title'];
                if($item['method'] == ConstantEnum::RECEIPT_METHOD['request']) {
                    $method = '생성';
                    $sign = "x";
                }else if($item['method'] == ConstantEnum::RECEIPT_METHOD['donate']) {
                    $method = '기부';
                    $sign = "-";
                }else {
                    return response()->json(['message'=>'false'], 401);
                }
            }else {
                return response()->json(['message'=>'false'], 401);
            }
            $result->push([
                'date'      => $date,
                'title'     => $title,
                'method'    => $method,
                'form_id'   => $form_id,
                'content'   => $content,
                'sign'      => $sign,
                'price'     => $value
            ]);
        }
        // 정렬
        $sortedResult = $result->sortByDesc(function ($list, $key) {
            $date = new Carbon($list['date']);
            return $date->timestamp;
        })->values()->all();
        
        return response()->json(['message'=>'true', 'list'=>$sortedResult], 200);
    }

       // 나의 판매 등록
       public function isSale(Request $request){
        
        $this->formModel->where('id',$request->id)->update(['is_sale' => 1]);
        
        return response()->json(['message'=>'true'],200);
    }
  

}
