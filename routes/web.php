<?php

use App\Http\Controllers\admin\AdminCityController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\AdminTicketController;
use App\Http\Controllers\admin\AdminTransportController;
use App\Http\Controllers\login\AdminLoginController;
use App\Http\Controllers\login\UserLoginController;
use App\Http\Controllers\user\UserCardDetailsController;
use App\Http\Controllers\user\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [UserLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserLoginController::class, 'login']);

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);

Route::middleware(['auth:users', 'role:user'])->group(function () {
    Route::get('user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('user/card', [UserCardDetailsController::class, 'showCardDetails'])
        ->middleware('retrieveCardId')
        ->name('user.card');
});

Route::middleware(['auth:admins', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('admin/cities', AdminCityController::class)->names([
        'index' => 'admin.cities.index',
        'create' => 'admin.cities.create',
        'store' => 'admin.cities.store',
        'edit' => 'admin.cities.edit',
        'update' => 'admin.cities.update',
        'destroy' => 'admin.cities.destroy',
    ]);

    Route::resource('admin/transports', AdminTransportController::class)->names([
        'index' => 'admin.transports.index',
        'create' => 'admin.transports.create',
        'store' => 'admin.transports.store',
        'edit' => 'admin.transports.edit',
        'update' => 'admin.transports.update',
        'destroy' => 'admin.transports.destroy',
    ]);

    Route::resource('admin/tickets', AdminTicketController::class)->names([
        'index' => 'admin.tickets.index',
        'create' => 'admin.tickets.create',
        'store' => 'admin.tickets.store',
        'edit' => 'admin.tickets.edit',
        'update' => 'admin.tickets.update',
        'destroy' => 'admin.tickets.destroy',
    ]);
});

Route::get('/api/docs', function () {
    return redirect('/api/documentation');
});
