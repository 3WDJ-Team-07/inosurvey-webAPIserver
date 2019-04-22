<?php

namespace App\Traits;

trait ModelScopes{

    public function scopeInsertMsgs($query, Array $msgs){
        $query->insert($msgs);
        //return $this->donationModel->create(request()->all());
    }

    public function scopeGetData($query,$col,$arg){
        return $query->where($col,$arg)->first();
    }

    //최근 생성된 컬럼 선택
    public function scopeGetLatest($query, $created_at){
        return $query->latest($created_at)->first();
    }
}
?>