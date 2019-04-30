<?php

namespace App\Http\Middleware;
/**
 * 클래스명:                     CheckToken
 * @package                     App\Http\Middleware
 * 클래스 설명:                 클리이언트의 토큰 값이 유효한지를 판단하는 미들웨어 
 * 만든이:                      3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                      2019년 4월 30일
 *
 * 함수 목록
 * handle(토큰):             유저의 토큰값이 유효한지를 검증한다.
 *
 */
use Closure;
use App\Http\Controllers\Helpers\ConstantEnum;
use \Firebase\JWT\JWT;
use \Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Log;
class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //클라이언트 토큰 유무 검증
        if(!$request->access_token){
            return response()->json(['message'=>'Not Token'], 400); 
        }

            
        //토큰 유효시간 검증
            try {

                $key = ConstantEnum::JWT_KEY['key']; 
                $jwt = $request->access_token;
                
                $token = JWT::decode($jwt, $key, array('HS256'));

                return $next($request);

            } catch (ExpiredException $e) {
                
                return response()->json(['message'=>'Token validity has expired'], 403);  
                
            }
    }

}

