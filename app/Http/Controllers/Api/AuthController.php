<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Http\Services\AuthLoginService;
use App\Http\Services\AuthRegisterService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(AuthLoginRequest $request, AuthLoginService $service ){
        return $service->handle($request);
    }

    public function register(AuthRegisterRequest $request, AuthRegisterService $service){
        return $service->handle($request);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return ['message' => 'Logged out'];
    }
}
