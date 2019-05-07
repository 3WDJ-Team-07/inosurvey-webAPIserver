<?php

namespace App\Traits;
/**
 * 클래스명:                       ModelScopes
 * @package                       App\Traits
 * 클래스 설명:                    모델에서 자주 사용되는 함수를 정리한 scope class
 * 만든이:                        3-WDJ 7조 ナナイロトリ 1501107 박보근 1701037 김민영
 * 만든날:                        2019년 5월 1일
 *
 * 함수 목록
 * scopeInsertMsgs(테이블 배열) :  테이블 생성
 * scopeGetLatest(컬럼 값) :        해당 컬럼의 가장 최근 작성된 행 조회        
 * scopeUpdateMsg(컬럼 내용) :      해당 컬럼 내용 update
 */
trait ModelScopes{

    public function scopeInsertMsgs($query, Array $msgs){
        return $query->insert($msgs);
    }

    //최근 생성된 컬럼 선택
    public function scopeGetLatest($query, $arg){
        return $query->select('*')->latest($arg)->first();
    }

    public function scopeUpdateMsg($query, $id, $column, $value){
        return $query->where('id', $id )->update([$column => $value]);
    }
}
?>