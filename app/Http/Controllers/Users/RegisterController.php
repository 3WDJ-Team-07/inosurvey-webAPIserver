<?php

namespace App\Http\Controllers\Users;
/**
 * 클래스명:                      RegisterController
 * @package                      App\Http\Controllers\Users
 * 클래스 설명:                   유저 회원가입 기능을 담당하는 컨트롤러
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                        2019년 3월 26일
 *
 * 함수 목록
 * register(유저정보) :           유저정보 요청을 받아 유저 지갑 생성 및 회원등록
 *
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ConstantEnum;
use App\Http\Controllers\Helpers\Guzzles;

use App\Models\Users\User;
use App\Models\Users\Wallet;

// use App\Http\Requests\UserRequest;

class RegisterController extends Controller {

    use Guzzles;

    public function register(Request $request){
    
        $user = User::create(request()->all());
        
        $walletCreateRes = $this->getGuzzleRequest(ConstantEnum::NODE_JS['wallet_create']);     //지갑 공개키,개인키 발급
         
        //요청 실패
         if($walletCreateRes['status'] != 200){
            return response()->json(['message'=>'Failed to create wallet'], 401);
        }

        $param = array(
            'public_key'    => $walletCreateRes['body'][ConstantEnum::ETHEREUM['public']],
            'private_key'   => $walletCreateRes['body'][ConstantEnum::ETHEREUM['private']],
            'user_id'       => $user->id,
            );
            
        Wallet::create($param);

        $faucetRes = $this->getGuzzleRequest(ConstantEnum::NODE_JS['faucet'] . '?user_id=' . $user->id . '&amount=' . '1000');  //첫 회원 가입시 1000ino 발급
        
         //요청 실패
         if($faucetRes['status'] != 200){
            return response()->json(['message'=>'Ino Payment Failure'], 401);
        }

        return response()->json(['message'=>'true'],200);
    }
}
