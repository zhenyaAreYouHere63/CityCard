<?php

use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\login\LoginController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'showUserLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'userLogin']);

Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'adminLogin']);

Route::middleware(['auth:users', 'role:user'])->group(function () {
    Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('user/card', [UserController::class, 'showCardDetails'])
        ->middleware('retrieveCardId')
        ->name('user.card');
});

Route::middleware(['auth:admins', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('admin/cities', CityController::class)->names([
        'index' => 'admin.cities.index',
        'create' => 'admin.cities.create',
        'store' => 'admin.cities.store',
        'edit' => 'admin.cities.edit',
        'update' => 'admin.cities.update',
        'destroy' => 'admin.cities.destroy',
    ]);

    Route::resource('admin/transports', TransportController::class)->names([
        'index' => 'admin.transports.index',
        'create' => 'admin.transports.create',
        'store' => 'admin.transports.store',
        'edit' => 'admin.transports.edit',
        'update' => 'admin.transports.update',
        'destroy' => 'admin.transports.destroy',
    ]);

    Route::resource('admin/tickets', TicketController::class)->names([
        'index' => 'admin.tickets.index',
        'create' => 'admin.tickets.create',
        'store' => 'admin.tickets.store',
        'edit' => 'admin.tickets.edit',
        'update' => 'admin.tickets.update',
        'destroy' => 'admin.tickets.destroy',
    ]);
});

Route::get('/api/docs', function () {
    return redirect('/docs');
});
