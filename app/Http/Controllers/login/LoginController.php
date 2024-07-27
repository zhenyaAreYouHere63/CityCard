<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showUserLoginForm()
    {
        return view('auth.user_login');
    }

    public function showAdminLoginForm()
    {
        return view('auth.admin_login');
    }

    public function userLogin(Request $request)
    {
        $guard = 'users';

        $credentials = $request->only('number', 'phone_number');
        $number = $request->input('number');

        if(Auth::guard($guard)->attempt($credentials)){
            $request->session()->put('cardId', $number);
            return redirect()->intended('user/dashboard');
        }

        return redirect()->back()->withErrors([
            'phone_number' => 'invalid phoneNumber or cardId',
        ]);
    }

    public function adminLogin(Request $request) {
        $guard = 'admins';

        $credentials = $request->only('email', 'password');

        if(Auth::guard($guard)->attempt($credentials)){
            return redirect()->intended('admin/dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'invalid email or password',
        ]);
    }
}
