<?php

namespace App\Http\Middleware;
/**
 * 클래스명:                     IsDonator
 * @package                     App\Http\Middleware
 * 클래스 설명:                 해당 유저가 기부단체 회원인지 검증 
 * 만든이:                      3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                      2019년 4월 19일
 *
 * 함수 목록
 * handle(유저정보):              해당 유저가 기부단체 회원인지 검증한다.
 *
 */
use Closure;


class IsDonator
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
        if($request->is_donator == 1){
            return $next($request);
        }else{
            return response()->json(['message' => 'You do not have the right to create a donation organization'],401);
        }
    }
}
