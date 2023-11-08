<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $credentials = request(['email','password']);
        if(!auth()->attempt($credentials)){
            return response()->json([
                'status'=>200,
                'message'=>'invalid data',
                'errors'=>[
                    'password'=>[
                        'invalid credentials'
                    ]
                ]
            ],422);
        }

        $user = User::whereEmail($request->email)->first();
        $authToken = $user->createToken('auth-token')->plainTextToken;

        return response()->json([
            'access_token'=>$authToken,
        ]);
    }
}
