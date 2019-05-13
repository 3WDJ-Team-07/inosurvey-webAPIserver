<?php

namespace App\Http\Controllers\Markets;
/**
 * 클래스명:                       ListController
 * @package                       App\Http\Controllers\Markets
 * 클래스 설명:                    설문 판매 관련 리스트를 조회하는 클래스
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근 1701037 김민영
 * 만든날:                        2019년 5월 1일
 *
 * 함수 목록
 * index()                  :      설문 판매 리스트 조회
 * show(설문아이디)          :      특정 설문 판매 정보 조회
 * sellableForms(유저아이디) :     유저가 판매할 수 있는 설문 리스트 조희           
 * sellableShow(설문아이디)  :     설문 상세 정보
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\ConstantEnum;
use App\Http\Controllers\Helpers\Guzzles;

use App\Models\Surveies\Form;

class ListController extends Controller
{

    use Guzzles;

    private $formModel = null;

    function __construct(){
        $this->formModel = new Form();
    }


    public function index(Request $request){
        
        $saleList =  $this->formModel->saleList()->get();
          
        foreach($saleList as $item){
           //유저 응답 보상 지급 
            $payload = array( 
                'form_params' => [
                    'user_id'   =>  $request->id,
                    'survey_id' =>  $item->id,
                ]
            );
            
            $priceRes = $this->getGuzzleRequest(ConstantEnum::NODE_JS['price'].$item->id);
            
            $isBuy    = $this->postGuzzleRequest($payload,ConstantEnum::NODE_JS['is_buy']); //이미 구매한 설문 표시
            
            if($isBuy['body']['isBuy'] == 'true'){
                $item->isBuy = true;     
            }else{
                $item->isBuy = false;
            }

            //요청 실패
            if($priceRes['status'] != 200){
                return response()->json([
                    'message'   => 'Market list lookup failed',
                    'status'    => 'List failure',
                ], 202);
            }
            // else if($isBuy['status'] != 200){
            //     return response()->json([
            //         'message'   => 'User failed to display purchase survey mark',
            //         'status'    => 'mark failure',
            //     ], 202);
            // }

           $price = $priceRes['body'][ConstantEnum::ETHEREUM['survey_price']];
           
           $item->price = $price;

        };

         if($saleList){
             return response()->json(['message'=>'true','list' => $saleList],200);
         }else{
             return response()->json(['message'=>'Not sale list'],400);
         }
     }
     
     //마켓 설문 정보
     public function show(Request $request){
        
         $survey = $this->formModel->saleList()->where('id',$request->id)->first();
        
         $priceRes = $this->getGuzzleRequest(ConstantEnum::NODE_JS['price'].$request->id);
         
        //요청 실패
        if($priceRes['status'] != 200){
            return response()->json(['message'=>'Market list lookup failed'], 401);
        }

         $price = $priceRes['body'][ConstantEnum::ETHEREUM['survey_price']];

     return response()->json(['message'=>'true','list' => $survey,'price' => $price],200);
         
     }
 
 
     public function sellableForms(Request $request){
         
         $sellableList = $this->formModel->where('user_id',$request->id)->where('is_completed',0)->get();
        
         return response()->json(['message'=>'true','list'=>$sellableList],200);
     }
     
  
     public function sellableShow(Request $request){
 
         $sellableList = $this->formModel->where('id',$request->id)->with(['target.job'])->first();
                
         return response()->json(['message'=>'true','list'=>$sellableList],200);
     }

}
