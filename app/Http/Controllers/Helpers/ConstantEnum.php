<?php

namespace App\Http\Controllers\Helpers;
/**
 * 클래스명:                       ConstantEnum
 * @package                       App\Http\Controllers\Helpers
 * 클래스 설명:                   시스템 전반에 사용되는 함수와 상수 목록을 정의하는 클래스
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                        2019년 4월 7일
 *
 * 상수 목록
 *      LOGIN_TYPE :             로그인 유형을 정의
 *      S3         :             AWS S3의 저장소 이름을 정의
 */

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConstantEnum extends Controller
{
    const LOGIN_TYPE =  [
        'type'              =>'user_id',
        'password'          =>'password',
    ];

    const S3 =  [
        'donations'         =>'donations',
        'surveies'          =>'surveies',
    ];

}
