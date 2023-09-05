<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Models\Admin;
use App\Models\User;
use App\Models\Role;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function add_user()
    {
        $roles = Role::where('id', '<>', Auth::id())->get();
        return view('auth.user.add-user')->with(compact('roles'));
    }

    public function create_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
            'role_id' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->messages();
            return redirect()->back()->with(compact('message'))->with("error", $message);
        }
        
        $users = User::create([
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('all-user')->with('notify_success', "User Create successfully")->with(compact('users'));
    }
   
    public function edit_user($id)
    {
        $roles = Role::all();
        $user = User::where('id', $id)->first();
        return view('auth.user.edit-user')->with(compact('user', 'roles'));
    }

    public function update_user(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role_id' => 'required',
            'id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $users = User::where('id', $request->id)->update([
            'name' => $request->name,
            'role_id' => $request->role_id,
        ]);
        if(isset($request->password))
        {
            $users = User::where('id', $request->id)->update([
                'password' => Hash::make($request->password),
            ]); 
        }
        return redirect()->route('all-user')->with('notify_success', "User Update successfully");
       
    }

    public function delete_user($id)
    {
        $user = User::where('id', $id)->delete();
        return redirect()->route('all-user')->with('notify_success', "User Delete successfully");
    }

    public function add_admin()
    {
        return view('auth.user.add-admin');
    }

    public function create_admin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins|max:255',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->messages();
            return redirect()->back()->with(compact('message'))->with("error", $message);
        }
        
        $admins = Admin::updateOrCreate(
            [
                'id' => 1
            ],
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );
        return redirect()->route('home')->with('notify_success', "admin Create successfully")->with(compact('admins'));
    }
    
}
