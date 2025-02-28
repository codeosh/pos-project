<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Page\ContactController;
use App\Http\Controllers\Page\ItemCatController;
use App\Http\Controllers\Page\ItemUnitController;
use App\Http\Controllers\Page\ProductListController;
use App\Http\Controllers\Page\SubCategoryController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\ItemUnit;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login_page');
})->name('page.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Item-Category Routes
Route::post('/Item-Category/Page/Store', [ItemCatController::class, 'store'])->name('item-category.store');
Route::get('/Item-Category/NextCode', [ItemCatController::class, 'getNextUnitCode']);
Route::get('/item-category/table', [ItemCatController::class, 'refreshTable'])->name('item-category.table');
Route::delete('/Item-Category/Delete/{unitcode}', [ItemCatController::class, 'destroy']);
Route::delete('/Item-Category/Reset', [ItemCatController::class, 'resetItemCategories']);
Route::put('/Item-Category/Update', [ItemCatController::class, 'update']);

// Contact Page Routes
Route::post('/Contact/Page/Store', [ContactController::class, 'store']);
Route::get('/Contact/NextCode', [ContactController::class, 'getNextUnitCode']);
Route::get('/contacts/table', [ContactController::class, 'refreshTable'])->name('contacts.table');
Route::delete('/Contact/Delete/{unitcode}', [ContactController::class, 'destroy']);
Route::get('/contacts/{unitcode}', [ContactController::class, 'show']);
Route::put('/contacts/update/{unitcode}', [ContactController::class, 'update'])->name('contacts.update');

// Item Unit Routes
Route::post('/Item-Units/Page/Store', [ItemUnitController::class, 'store']);
Route::get('/Item-Units/NextCode', [ItemUnitController::class, 'getNextUnitCode']);
Route::get('/Item-Units/table', [ItemUnitController::class, 'refreshTable'])->name('item-unit.table');
Route::delete('/Item-Unit/Delete/{unitcode}', [ItemUnitController::class, 'destroy']);
Route::delete('/Item-Unit/Reset', [ItemUnitController::class, 'resetItemUnit']);
Route::put('/Item-Unit/Update', [ItemUnitController::class, 'update']);

// Item Sub-Category Routes
Route::post('/Sub-Category/Page/Store', [SubCategoryController::class, 'store']);
Route::get('/Sub-Category/NextCode', [SubCategoryController::class, 'getNextUnitCode']);
Route::get('/Sub-Category/table', [SubCategoryController::class, 'refreshTable'])->name('sub-category.table');
Route::delete('/Sub-Category/Delete/{unitcode}', [SubCategoryController::class, 'destroy']);
Route::delete('/Sub-Category/Reset', [SubCategoryController::class, 'resetSubCategory']);
Route::put('/Sub-Category/Update', [SubCategoryController::class, 'update']);

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
    Route::get('/item-category', [ItemCatController::class, 'index'])->name('page.item-category');
    Route::get('/contacts', [ContactController::class, 'index'])->name('page.contact');
    Route::get('/product-list', [ProductListController::class, 'index'])->name('page.productl-list');
    Route::get('/item-units', [ItemUnitController::class, 'index'])->name('page.item-units');
    Route::get('/sub-category', [SubCategoryController::class, 'index'])->name('page.sub-category');
});
