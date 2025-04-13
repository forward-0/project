<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()  {
        return view('login');
    }
    public function loginRegister(Request $request)  {
        {
            $credentials = $request->only('user_name', 'password');

            if (Auth::attempt($credentials)) {

                // احراز هویت موفق
                return redirect()->intended('/index');

            }

            // احراز هویت ناموفق
            return back()->with('error', 'Invalid credentials');
        }

    }
    public function logout(Request $request)  {
        {




                Auth::logout();
                return redirect('index');


        }

    }
    public function sign()  {
        return view('sign');
    }
    public function signRegister(Request $request)  {
        User::create([
            'real_name'=>$request->realname,
            'user_name'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'type'=>'0'
        ]);

        return redirect('index');
    }


}
