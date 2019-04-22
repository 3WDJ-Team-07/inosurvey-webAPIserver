<?php

namespace App\Traits;

trait ModelScopes{

    public function scopeInsertMsgs($query, Array $msgs){
        return $query->insert($msgs);
    }

    public function scopeGetMsg($query,$id){
        return $query->where('id', $id)->first();
    }

    //최근 생성된 컬럼 선택
    public function scopeGetLatest($query, $created_at){
        //return $query->latest($created_at)->get();
        return $query->select('*')->orderBy($created_at,'DESC')->first();
    }

    public function scopeUpdateMsg($query, $id, $column, $value){
        return $query->where('id', $id )->update([$column => $value]);
    }
}
?>