<?php

namespace App\Http\Controllers;

use App\Enums\Roles;
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
     //validation
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
    public function reg(Request $request){
        
        $validate = Validator::make($request->only(['name', 'password', 'email', 'confirm_password']), [
            'name' => 'required',
            'password' => 'required',
            'email' =>'required|unique:users',
            'confirm_password' => 'required|required_with:password'
        ]);
         if ($validate->fails()){
            // dd($validate);
            return back()->withErrors($validate);
         }

         User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            // 'role' => Roles::User
         ]);

         return redirect('/');
    }
     
}


// User::create([
    //     'name'=>'user',
    //     'password'=>Hash::make('123'),
    //     'email'=>'test@mail.ru'