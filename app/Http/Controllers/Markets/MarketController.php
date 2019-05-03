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
            ]
        );


        $response = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['sales']);
 
        //판매 요청 실패
        if($response['status'] != 200){
            return response()->json(['message'=>'Payment failed'],401);
        }


        $sellableList = $this->formModel->completedList('id',$request->id);
        $sellableList->update(['is_sale' => 1]);
        return response()->json(['message'=>'true','id'=>$request->id],200);

    }

    //설문 구매
    public function purchase(Request $request){
    
        $payload = array( 
            'form_params' => [
                'user_id'   =>  $request->user_id,
                'survey_id' =>  $request->id,
            ]
        );
        
        $response = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['buy']);
         

      
         if($response['status'] != 200){                                            //요청 실패
            
            return response()->json(['message'=>'Survey purchase failed'], 401);

        }else if($response['status'] == 401){                                       //이미 구매한 설문
            
            

        }




        return response()->json(['message'=>'true'],200);        

    }
    
}
