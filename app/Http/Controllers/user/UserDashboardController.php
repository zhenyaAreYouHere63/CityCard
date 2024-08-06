<?php

namespace App\Http\Controllers\user;

use Illuminate\View\View;

class UserDashboardController
{
    public function index(): View
    {
        return view('user.dashboard');
    }
}
