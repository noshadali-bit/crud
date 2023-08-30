<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        return view('Admin.home');
    }
    
    public function admin_logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login'); // Redirect to admin login page
    }
}
