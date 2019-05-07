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
 * ganerateToken(회원정보)      JWT토큰을 생성하는 함수
 * username()     :            유저 로그인 형식을 지정하는 함수    
 *
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ConstantEnum;
use \Firebase\JWT\JWT;
use Auth;

class LoginController extends Controller {

   public function login(Request $request) {
       
        $credentials = $request->only([
                ConstantEnum::LOGIN_TYPE['type'],
                ConstantEnum::LOGIN_TYPE['password'],
            ]);
            
        //유저 정보 체크
        if(Auth::attempt($credentials)){
            
            $jwt = $this->ganerateToken(Auth::user()->id);     //jwt 토큰 발급

            return response()->json(['message' => 'true','access_token' => $jwt],200); 
        }else{
            return response()->json(['message' => 'false'],401);
        }

    }//end of login
    
    //jwt토큰 생성
    public function ganerateToken($user){
        
        $key = ConstantEnum::JWT_KEY['key'];
        $token = array(
            "user"  => $user,                           //로그인 유저정보
            "iss"   => ConstantEnum::JWT_KEY['iss'],    //토큰 발급자
            "exp"   => time()+ ( 60 * 60 * 24 ),        //토큰 만료시간 (24시간)
            "iat"   => time()                           //토큰 발급시간     
        );

        $jwt = JWT::encode($token, $key,'HS256');       //토큰 생성
        
        return $jwt;
    }//end of ganerateToken


    //로그인 타입
    public function username(){
        return ConstantEnum::LOGIN_TYPE['type'];
    }


}
