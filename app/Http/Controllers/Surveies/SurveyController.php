<?php

namespace App\Http\Controllers\Surveies;
/**
 * 클래스명:                       SurveyController
 * @package                       App\Http\Controllers\Surveies
 * 클래스 설명:                    설문 부가기능을 담당하는 클래스
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                        2019년 4월 10일
 *
 * 함수 목록
 * abort(설문아이디)            진행중인 설문을 강제 중단시키는 함수
 * 
 */

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Surveies\Form;

class SurveyController extends Controller {
    
    
    private $formModel          = null;

    public function __construct() {
        $this->formModel            = new Form();
      
    }


    //설문 중단
    public function abort(Request $request){
        
        $this->formModel->where('id',$request->id)->update(['is_completed' => 1]);

        return response()->json(['message'=>'true'],200);
    }

}
