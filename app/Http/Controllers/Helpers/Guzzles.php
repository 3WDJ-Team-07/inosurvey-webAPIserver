<?php

namespace App\Http\Controllers\Helpers;
/**
 * 클래스명:                      Guzzles
 * @package                      App\Http\Controllers\Helpers
 * 클래스 설명:                   유저 회원가입 기능을 담당하는 컨트롤러
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                        2019년 4월 7일
 *
 * 함수 목록
 * getGuzzleRequest(HTTP,URL) : nodeJs 서버로부터 데이터를 GET방식으로 요청하고 데이터를 받아 필요 컨트롤러에 응답
 *
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \GuzzleHttp\Client;

trait Guzzles {
    
     public function getGuzzleRequest($http,$url) { 
        $host = config('constants.ethereum_host');
        $port = config('constants.ethereum_port');
        
        $client = new Client(); 
        $request = $client->request($http,$host.':'.$port.'/'.$url); 
        $response = $request->getBody();
       
        $result = (json_decode($response,true)); 
         return $result;
     }
     
}
