<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(){
        return view('auth.login');
    }

    public function login(Request $request){
        if (Auth::check()){
            return redirect()->intended('/products');
        }

        $validated = $request->validate([
           'email' => 'required|email',
           'password' => 'required',
        ]);

        if (Auth::attempt($validated)){
            return redirect()->intended('/products');
        }

        return back()->with('message', 'Проверьте логин или пароль');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('products.index');
    }
}
