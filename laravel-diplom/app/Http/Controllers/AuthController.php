<?php

namespace App\Http\Controllers;

use App\Enums\Roles;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }
    public function regForm(){
        return view('auth.reg');
    }
    public function auth(Request $request){
   
            $validate = Validator::make($request->only(['name', 'password']), [
                'name' => 'required',
                'password' => 'required'
            ]);
             if ($validate->fails()){
                return back()->withErrors($validate);
             }
     if (!Auth::attempt(['name' => $request->name, 'password' => $request->password])) {
        return back()->withErrors('Invalid login or password');
       
    }

    return redirect()->intended('/account');
    }
    public function reg(Request $request)
    {
     
        $validate = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', 
        ]);

        if ($validate->fails()) {
            return back()->withErrors($validate);
        }

        $role = Role::where('name', Roles::USER->value)->first();

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $role ? $role->id : null, 
        ]);

        return redirect('/');
    }
     
}


// User::create([
    //     'name'=>'user',
    //     'password'=>Hash::make('123'),
    //     'email'=>'test@mail.ru'