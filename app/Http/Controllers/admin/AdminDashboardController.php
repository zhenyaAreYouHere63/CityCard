<?php

namespace App\Http\Controllers\admin;

use Illuminate\View\View;

class AdminDashboardController
{
    public function index(): View
    {
        return view('admin.dashboard');
    }
}
