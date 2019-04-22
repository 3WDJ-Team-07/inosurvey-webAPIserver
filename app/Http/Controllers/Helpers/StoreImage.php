<?php

namespace App\Http\Controllers\Helpers;
/**
 * 클래스명:                       StoreImageTrait
 * @package                       App\Http\Controllers\Helpers
 * 클래스 설명:                   시스템 전반에 사용되는 이미지 업로드 함수를 정의하는 트레이트
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근
 * 만든날:                        2019년 4월 11일
 *
 * 함수 목록
 * fileUpload(파일,저장소명) :    파일 이미지를 검증하고  AWS S3 저장소에 파일을 저장한다.
 *
 */
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Webpatser\Uuid\Uuid;

trait StoreImage
{
    public function fileUpload($request,$storage){
        
        //파일 데이터 검증
        if($request->hasFile('file')) {
            $file = $request->file('file')->getClientOriginalName();                    //파일 원본 이름 출력
            $uuid = (String)Uuid::generate(4);                                          //uuid 생성
            $file = $uuid.$file;
            $filePath = config('filesystems.disks.s3.url').'/'.$storage.'/'.$file;       //저장소 url 생성
        }else {
            return false;
        } 

        //S3저장소 저장
        $request->file('file')->storeAs(
            $storage,
            $file,
            's3'
        );

        return $filePath;
    }
}
