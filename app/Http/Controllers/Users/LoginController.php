<?php

namespace App\Http\Controllers\Users;
/**
 * 클래스명:                     LoginController
 * @package                     App\Http\Controllers\Users
 * 클래스 설명:                 유저 로그인 기능을 담당하는 컨트롤러
 * 만든이:                      3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                      2019년 3월 26일
 *
 * 함수 목록
 * login(회원정보):             회원정보를 받아 인증하고 권한부여
 * ganerateToken()             JWT토큰을 생성하는 함수
 * username()     :            유저 로그인 형식을 지정하는 함수    
 *
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Firebase\JWT\JWT;
use Auth;
use App\Http\Controllers\Helpers\ConstantEnum;

class LoginController extends Controller {

   public function login(Request $request) {
       
        $credentials = $request->only([
                ConstantEnum::LOGIN_TYPE['type'],
                ConstantEnum::LOGIN_TYPE['password'],
            ]);

        //유저 정보 체크
        if(Auth::attempt($credentials)){
            //jwt 토큰 생성
            $jwt = $this->ganerateToken();
            return response()->json(['message' => 'true','access_token' => $jwt],200); 
        }else{
            return response()->json(['message' => 'false'],401);
        }

    }
    
    //jwt토큰 생성
    public function ganerateToken(){
        
        $key = "inosurvey";
        $token = array(
            "user" => "@zxc123123",
            // "exp" => 24*7,
            // "iat" => 1356999524     
        );

        $jwt = JWT::encode($token, $key,'HS256');
        
        return $jwt;
    }


    //로그인 타입
    public function username(){
        return ConstantEnum::LOGIN_TYPE['type'];
    }


}
