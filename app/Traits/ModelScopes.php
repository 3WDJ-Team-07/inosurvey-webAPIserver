<?php

namespace App\Traits;

trait ModelScopes{

    public function scopeInsertMsgs($query, Array $msgs){
        $query->create(
            $mags
        );
        //return $this->donationModel->create(request()->all());
    }

    public function scopeGetData($query,$col,$arg){
        return $query->where($col,$arg)->first();
    }

}
?>