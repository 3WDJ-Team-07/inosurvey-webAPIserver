<?php

namespace App\Http\Controllers\Markets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Surveies\Form;

class MarketController extends Controller
{

    private $formModel = null;

    function __construct(){
        $this->formModel = new Form();
    }
      
    public function index(){
       $saleList =  $this->formModel->saleList()->get();

        if($saleList){
            return response()->json(['message'=>'true','list' => $saleList],201);
        }else{
            return response()->json(['message'=>'Not sale list'],201);
        }
    }

    //마켓 설문 정보
    public function show(Request $request){
    
        $survey = $this->formModel->saleList()->getData('id',$request->id)->first();

        return response()->json(['message'=>'true','list'=>$survey],200);
    }

    //완료(is_sale = false,is_completed = true) 설문 리스트
    public function sellableForms(Request $request){
        $sellableList = $this->formModel->completedList($request->id)->get();

        return response()->json(['message'=>'true','list'=>$sellableList],200);
    }

    // //설문이 완료 되었는지 체크하는 함수 (스케줄링)
    // public function isCompleted(Request $request){

    //     //


    // }

}
