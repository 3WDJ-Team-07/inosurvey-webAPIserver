<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \GuzzleHttp\Client;

Trait Guzzles  {
    
     public function getGuzzleRequest($http,$url) { 
        $host = config('constants.ethereum_host');
        $port = config('constants.ethereum_port');

        $client = new Client(); 
        $request = $client->request($http,$host.':'.$port.$url); 
        $response = $request->getBody(); 
        $dd = (json_decode($response,true)); 
            dd($dd['user']); 
     }
     
}
