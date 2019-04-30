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
 *
 */

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ConstantEnum;
use App\Http\Controllers\Helpers\Guzzles;
use \Firebase\JWT\JWT;
use Auth;

use App\Models\Users\User;
use App\Models\Surveies\Form;

class UserController extends Controller
{
    use Guzzles;

    private $userModel = null;
    private $formModel = null;

    function __construct(){
        $this->userModel = new User();
        $this->formModel = new Form();
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


       // 나의 판매 등록
       public function isSale(Request $request){
        
        $this->formModel->where('id',$request->id)->update(['is_sale' => 1]);
        
        return response()->json(['message'=>'true'],200);
    }
  

}
