<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function all_user()
    {
        $users = User::all();
        return view('auth.user.all-user')->with(compact('users'));
    }
}
