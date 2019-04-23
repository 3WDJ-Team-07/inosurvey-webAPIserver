<?php

namespace App\Traits;

trait ModelScopes{

    public function scopeInsertMsgs($query, Array $msgs){
        return $query->insert($msgs);
    }

    //특정 칼럼으로 레코드 찾기
    public function scopeGetData($query,$col,$arg){
        return $query->where($col,$arg);

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