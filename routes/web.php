<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login_page');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin routes
Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
    Route::get('/admin-dashboard', function () {
        return view('dashboard.admin_dashboard');
    })->name('admin.dashboard');
});

// User routes
Route::middleware([RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/user-dashboard', function () {
        return view('dashboard.user_dashboard');
    })->name('user.dashboard');
});
