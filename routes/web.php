<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/category-products', [HomeController::class, 'categoryProducts'])->name('category-products');
Route::get('/details', [HomeController::class, 'details'])->name('details');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/add-products', [DashboardController::class, 'addProducts'])->name('products.add');
    Route::post('/new-products', [DashboardController::class, 'newProducts'])->name('products.new');
    Route::get('/manage-products', [DashboardController::class, 'manageProducts'])->name('products.manage');
    Route::get('/delete-products/{id}', [DashboardController::class, 'deleteProducts'])->name('products.delete');
    Route::get('/edit-products/{id}', [DashboardController::class, 'editProducts'])->name('products.edit');
    Route::post('/update-products/{id}', [DashboardController::class, 'updateProducts'])->name('products.update');
});
