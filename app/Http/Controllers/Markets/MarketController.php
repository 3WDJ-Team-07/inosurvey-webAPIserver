<?php

namespace App\Http\Controllers\Markets;
/**
 * 클래스명:                       MarketController
 * @package                       App\Http\Controllers\Markets
 * 클래스 설명:                    설문결과를 구매하고 판매할 수 있는 클래스
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근 1701037 김민영
 * 만든날:                        2019년 4월 18일
 *
 * 함수 목록
 * salesRegistration(판매자,설문)   : 설문 판매
 * purchase(구매자,설문)            : 설문 구매 
 *
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ConstantEnum;
use App\Http\Controllers\Helpers\Guzzles;

use App\Models\Surveies\Form;

class MarketController extends Controller
{

    use Guzzles;

    private $formModel = null;

    function __construct(){
        $this->formModel = new Form();
    }
      
    
    //판매 등록
    public function salesRegistration(Request $request){
      
        //설문 판매등록
        $payload = array( 
            'form_params' => [
                'user_id'       => $request->user_id,
                'survey_id'     => $request->id,
                'price'         => $request->price
            ]
        );

        $saleRes = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['sales']);
 
        //판매 요청 실패
        if($saleRes['status'] != 200){
            return response()->json(['message'=>'sale failed'],401);
        }

        $sellableList = $this->formModel->where('id',$request->id);

        $sellableList->update(['is_completed' => 1,'is_sale' => 1]);
        
        return response()->json(['message'=>'true','id'=>$request->id],200);

    }

    //설문 구매
    public function purchase(Request $request){
    
        //자신의 설문인지 검증 
        if($this->formModel->purchaseVerification($request)){
            return response()->json([
                'message'   => 'You cannot purchase your own questionnaire',
                'status'    => 'mysurvey'
        ], 202);
        }

        $payload = array( 
            'form_params' => [
                'user_id'   =>  $request->user_id,
                'survey_id' =>  $request->id,
            ]
        );
        
        $buyRes = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['buy']);
         
        if($buyRes['status'] == 402){                                               //요청 실패
            
            return response()->json([
                'message'   => 'Survey purchase failed',
                'status'    => 'request failure',
            ], 202);

        }else if($buyRes['status'] == 401){                                         //구매한 설문 재구매 불가                              
            
            return response()->json([
                'message'=>'This survey has already been purchased.',
                'status'=>'duplicated'
            ],202);
        
        }

        return response()->json(['message'=>'true'],200);        

    }
    
}
