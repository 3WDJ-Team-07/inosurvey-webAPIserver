<?php

namespace App\Traits;

trait ModelScopes{

    public function scopeInsertMsgs($query, Array $msgs){
        $query->create(
            $mags
        );
        //return $this->donationModel->create(request()->all());
    }

    public function scopeGetMsg($query,$id)
    {
        return $query->where('id', $id)->first();
    }

}
?>