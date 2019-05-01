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
            return response()->json(['message'=>'true','list' => $saleList],200);
        }else{
            return response()->json(['message'=>'Not sale list'],400);
        }
    }

    //마켓 설문 정보
    public function show(Request $request){
    
        $survey = $this->formModel->saleList()->where('id',$request->id)->first();

        return response()->json(['message'=>'true','list'=>$survey],200);
        
    }


    //판매 등록
    public function create(Request $request){

        $sellableList = $this->formModel->completedList('id',$request->id);
        $sellableList->update(['is_sale' => 1]);
        return response()->json(['message'=>'true','id'=>$request->id],200);

    }


    //완료(is_sale = false,is_completed = true) 설문 리스트
    public function sellableForms(Request $request){
        
        $sellableList = $this->formModel->completedList('user_id',$request->id)->get();
       
        return response()->json(['message'=>'true','list'=>$sellableList],200);
    }
    
    //완료(is_sale = false,is_completed = true) 설문 상세
    public function sellableShow(Request $request){

        
        $sellableList = $this->formModel->completedList('id',$request->id)->with(['target.job'])->get();

       
        return response()->json(['message'=>'true',$sellableList],200);
    }
}
