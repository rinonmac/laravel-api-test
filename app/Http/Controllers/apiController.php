<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Users;
use app\products;
use auth;

class apiController extends Controller
{
    public function test(){
        return response()->json([
            "success" => true,
            "message" => "Welcome to Skyler's Test API"
        ]);
    }

    public function login(Request $request){
        $data = [
            'phonenumber' => $request->phonenumber,
            'password' => $request->password
        ];
        
        if (auth() -> attempt($data)){
            $token = auth()->user()->createToken('bearer')->access_token;
            return response()->json(['token' => $token], 200);
        }else{
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
