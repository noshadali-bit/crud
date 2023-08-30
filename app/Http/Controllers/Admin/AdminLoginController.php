<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard')->with('notify_success','You are already logged in as Admin');
        }
        return view('admin.login'); 
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard'); 
        } else {
            return redirect()->back()->with('error', 'Invalid credentials.');
        }
    }
}
