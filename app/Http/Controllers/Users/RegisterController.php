<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\User;
// use App\Http\Requests\UserRequest;

class RegisterController extends Controller
{
    private $user = null;

    function __construct(){
        $this->user = new User();
    }
    
    public function register(Request $request) {
            $this->user->create(request()->all());
        return response()->json(['message'=>'true'],200);
    }
}
