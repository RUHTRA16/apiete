<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function login(Request $request){
        $request->only([
                'email',
                'password'
            ]);
        $user = User::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password)){
            return response()->json([
                'status' => 'error',
                'message' => 'Email ou senha inválido'
            ],Response::HTTP_BAD_REQUEST);
        }

        $token = $user->createToken($request->email)->plainTextToken;
      
        return response()->json([
                'status' => 'success',
                'user' => $user,
                'token' => $token
            ],Response::HTTP_OK);
    }
}
