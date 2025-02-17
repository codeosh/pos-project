<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Page\ContactController;
use App\Http\Controllers\Page\ItemCatController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login_page');
})->name('page.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Item-Category Routes
Route::post('/Item-Category/Page/Store', [ItemCatController::class, 'store'])->name('item-category.store');
Route::get('/Item-Category/NextCode', [ItemCatController::class, 'getNextUnitCode']);
Route::get('/Item-Category/Fetch', [ItemCatController::class, 'fetchItemCategories']);
Route::delete('/Item-Category/Delete/{unitcode}', [ItemCatController::class, 'destroy']);
Route::delete('/Item-Category/Reset', [ItemCatController::class, 'resetItemCategories']);
Route::put('/Item-Category/Update', [ItemCatController::class, 'update']);

// Contact Page Routes
Route::post('/Contact/Page/Store', [ContactController::class, 'store']);
Route::get('/Contact/NextCode', [ContactController::class, 'getNextUnitCode']);
Route::get('/contacts/table', [ContactController::class, 'refreshTable'])->name('contacts.table');

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

// Group User and Admin Routes
Route::middleware([RoleMiddleware::class . ':admin'], [RoleMiddleware::class . ':user'])->group(function () {
    Route::get('/item-category', function () {
        return view('pages.item_category');
    })->name('page.item-category');
    Route::get('/contacts', [ContactController::class, 'index'])->name('page.contact');
});
