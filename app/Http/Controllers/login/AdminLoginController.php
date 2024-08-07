<?php

namespace App\Http\Controllers\login;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminLoginController extends Controller
{
    public function showLoginForm(): View
    {
        return view('auth.admin_login');
    }

    public function login(Request $request): RedirectResponse
    {
        $guard = 'admins';

        $credentials = $request->only('email', 'password');

        if(Auth::guard($guard)->attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }

        return redirect()->back()->withErrors([
            'email' => 'invalid email or password',
        ]);
    }
}
