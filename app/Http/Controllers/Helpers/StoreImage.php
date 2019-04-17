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
       
        if($request->hasFile('file')) {
            $file = $request->file('file')->getClientOriginalName();
            $uuid = (String)Uuid::generate(4);
            $file = $uuid.$file;
            $fileUrl = config('filesystems.disks.s3.url').'/'.$storage.'/'.$file;
        }else {
            return false;
        } 

        $request->file('file')->storeAs(
            $storage,
            $file,
            's3'
        );

        return $fileUrl;
    }
}
