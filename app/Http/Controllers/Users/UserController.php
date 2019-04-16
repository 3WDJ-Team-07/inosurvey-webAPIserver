<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Firebase\JWT\JWT;
use Auth;
class UserController extends Controller
{
    public function check(Request $request){
        
        if(!$request->access_token){
            return response()->json(['message'=>'not Token'],400); 
        }

            $key = "inosurvey";
            $jwt = $request->access_token;
        
            $user = (array) JWT::decode($jwt, $key, array('HS256'));
        
            if(Auth::id() == $user['user']->id){
                return response()->json(['message'=>'true','user'=>Auth::user()],200);
            }else {
                return response()->json(['message'=>'false1'],400);
            }
    }

}
