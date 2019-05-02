<?php

namespace App\Http\Controllers\Surveies;
/**
 * 클래스명:                       RequestListController
 * @package                       App\Http\Controllers\Surveies
 * 클래스 설명:                    기부 관련 리스트를 조회하는 클래스
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근 1701037 김민영
 * 만든날:                        2019년 5월 1일
 *
 * 함수 목록
 * index() :                     설문 리스트 조회
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Surveies\Form;

class RequestListController extends Controller
{
    private $formModel = null;
   
    public function __construct() {

        $this->formModel = new Form();
   
    }

    public function index(){
        $serveies = $this->formModel->getSurveies()->get();
        return response()->json(['message'=>'true','surveies'=>$serveies],200);
    }



}
