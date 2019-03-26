<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;

class RegisterController extends Controller
{
    private $user = null;

    function __construct(){
        $this->user = new User();
    }


    public function register(UserRequest $request) {
            $this->user->create(request()->all());
        return response()->json(['message'=>'true'],200);
    }
}
