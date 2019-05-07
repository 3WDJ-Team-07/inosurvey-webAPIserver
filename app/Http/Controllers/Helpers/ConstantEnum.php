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
 *      LOGIN_TYPE    :             로그인 유형을 정의
 *      JWT_KEY       :             JWT 토큰의 key를 정의
 *      S3            :             AWS S3의 저장소 이름을 정의
 *      ETHEREUM      :             블록체인의 정보를 조회하기위한 key를 정의
 *      RECEIPT_TITLE :             유저 서비스 이력조회  키워드 
 *      RECEIPT_METHOD:             유저 서비스 이력조회  실행시킬 함수
 *      NODE_JS       :             nodeJs 서버의 Api URL을 정의
 */

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConstantEnum extends Controller
{

    const LOGIN_TYPE =  [
        'type'              => 'user_id',
        'password'          => 'password',
    ];

    const JWT_KEY = [
        'key'               => 'inosurvey',
        'iss'               => 'inosurvey.com',
    ];

    const S3 =  [
        'donations'         => 'donations',
        'surveies'          => 'surveies', 
    ];

    const ETHEREUM =  [
        'public'            => 'public_key',
        'private'           => 'private_key',
        'amount'            => 'currAmount',
        'totalAmount'       => 'totalAmount',
        'survey_price'      => 'sellPrice',
    ];
    
    const RECEIPT_TITLE = [
        'survey'            => 0,
        'foundation'        => 1,
        'product'           => 2,
    ];

    const RECEIPT_METHOD = [
        'request'           => 0,
        'response'          => 1,
        'donate'            => 2,
        'buy'               => 3,
        'sell'              => 4,
        'reward'            => 5,
    ];

    const NODE_JS =  [
        'wallet_create'             => '/wallet/create',
        'wallet'                    => '/wallet/amount',
        'all_receipt'               => '/wallet/receipt/all',
        'survey_request_receipt'    => '/wallet/receipt/survey/request',
        'survey_response_receipt'   => '/wallet/receipt/survey/response',
        'survey_buy_receipt'        => '/wallet/receipt/survey/buy',
        'survey_sell_receipt'       => '/wallet/receipt/survey/sell',
        'donation_request_receipt'  => '/wallet/receipt/donation/request',
        'donation_donate_receipt'   => '/wallet/receipt/donation/donate',
        'payment'                   => '/survey/request',
        'reward'                    => '/survey/response',
        'establishment'             => '/foundation/create',
        'donate'                    => '/foundation/donate',
        'sales'                     => '/market/survey/add',
        'price'                     => '/survey/',
        'buy'                       => '/market/survey/buy',
    ];
}
