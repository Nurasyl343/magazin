<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthLoginService
{
    public function handle($request){
        $user = User::where('email', $request['email'])->first();

        if(!$user || !Hash::check($request['password'], $user->password)){
            return response([
                'message' => 'Login parol durys emes'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = $user->createToken('mytoken')->plainTextToken;


        return response([
            'user' => $user,
            'token' => $token,
        ], Response::HTTP_CREATED);
    }
}
