<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserLoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.user_login');
    }

    public function login(Request $request): RedirectResponse
    {
        $guard = 'users';

        $credentials = $request->only('number', 'phone_number');
        $number = $request->input('number');

        if (Auth::guard($guard)->attempt($credentials)) {
            $request->session()->put('cardId', $number);
            return redirect()->intended('user/dashboard');
        }

        return redirect()->back()->withErrors([
            'phone_number' => 'invalid phoneNumber or cardId',
        ]);
    }
}
