<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with('role')->get();
        return view('admin.users', ['users' => $users]);
    }

    public function adminber(User $user){
        $user->update([
            'role_id' => '2'
        ]);
        return back();
    }

    public function userber(User $user){
        $user->update([
            'role_id' => '1'
        ]);
        return back();
    }
}
