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
use \Firebase\JWT\JWT;
use Auth;
use App\Http\Controllers\Helpers\ConstantEnum;

use App\Models\Users\User;

class UserController extends Controller
{

    private $userModel = null;

    function __construct(){
        $this->userModel = new User();
        
    }


    public function check(Request $request){
        
        //클라이언트 토큰 유무 검증
        if(!$request->access_token){
            return response()->json(['message'=>'Not Token'],400); 
        }

            $key = ConstantEnum::JWT_KEY['key']; 
            $jwt = $request->access_token;

            $user = (array) JWT::decode($jwt, $key, array('HS256'));                //decode후  Array로 캐스팅

            if($user['user']->id){
                    $userData = $this->userModel->getData('id',$user['user']->id);  //토큰의 정보와 일치하는 유저 정보를 추출
                return response()->json(['message'=>'true','user'=>$userData],200);
            }else {
                return response()->json(['message'=>'false'],400);
            }
    }

}
