<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */



    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email,'password'=> $request->password,'is_delete' => $request->is_delete])){
            return redirect()->route('home');
        }
        return redirect()->route('sign-in')->with(['msg' => 'Sai tài khoản hoặc mật khẩu, Tài khoản đã bị chặn']);
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('home');
    }
}
