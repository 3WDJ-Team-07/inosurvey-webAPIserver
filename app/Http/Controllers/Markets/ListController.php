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
 * index() :                      설문 판매 리스트 조회
 * show(설문아이디) :              특정 설문 판매 정보 조회
 * sellableForms() :
 * sellableShow()  :
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


    public function index(){
        $saleList =  $this->formModel->saleList()->get();
          
        // foreach($saleList as $item){
           
        //    $response = $this->getGuzzleRequest(ConstantEnum::NODE_JS['price'].$item->id);
         
        //    $price = $response['body'][ConstantEnum::ETHEREUM['survey_price']];
           
        //    $item->price = $price;

        // };

         if($saleList){
             return response()->json(['message'=>'true','list' => $saleList],200);
         }else{
             return response()->json(['message'=>'Not sale list'],400);
         }
     }
     
     //마켓 설문 정보
     public function show(Request $request){
        
         $survey = $this->formModel->saleList()->where('id',$request->id)->first();
        
         $response = $this->getGuzzleRequest(ConstantEnum::NODE_JS['price'].$request->id);
         
         $price = $response['body'][ConstantEnum::ETHEREUM['survey_price']];

         return response()->json(['message'=>'true','list' => $survey,'price' => $price],200);
         
     }
 
 
     //완료(is_sale = false,is_completed = true) 설문 리스트
     public function sellableForms(Request $request){
         
         $sellableList = $this->formModel->completedList('user_id',$request->id)->get();
        
         return response()->json(['message'=>'true','list'=>$sellableList],200);
     }
     
     //완료(is_sale = false,is_completed = true) 설문 상세
     public function sellableShow(Request $request){
 
         $sellableList = $this->formModel->completedList('id',$request->id)->with(['target.job'])->first();
                
         return response()->json(['message'=>'true','list'=>$sellableList],200);
     }

}
