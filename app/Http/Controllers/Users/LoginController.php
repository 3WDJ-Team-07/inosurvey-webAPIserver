<?php

namespace App\Http\Controllers\Users;

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
