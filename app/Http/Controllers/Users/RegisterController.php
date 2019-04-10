<?php

namespace App\Http\Controllers\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Users\User;
// use App\Http\Requests\UserRequest;

class RegisterController extends Controller {
    private $userModel = null;

    function __construct(){
        $this->userModel = new User();
    }
                                  
    public function register(Request $request){
            $this->userModel->create(request()->all());
        return response()->json(['message'=>'true'],201);
    }
}
