<?php

namespace App\Http\Controllers\Surveies;
/**
 * 클래스명:                       QuestionBankController
 * @package                       App\Http\Controllers\Surveies
 * 클래스 설명:                    설문은행에 자주 사용되는 질문 데이터를 프론트엔드에 응답하는 컨트롤러
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                        2019년 4월 6일
 *
 * 함수 목록
 * questionBank() :                 DB에 질문데이터를 가져오고 프론트엔드에 응답
 *
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Surveies\QuestionBank;

class QuestionBankController extends Controller
{
    
     public function questionBank(){
        if(Questionbank::all()) {
            return Questionbank::all();
        }else {
            return response()->json(['message'=>'false'],400);
        }
    }
}
