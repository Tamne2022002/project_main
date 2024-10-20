<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\Admin\AuthController; 
use App\Http\Controllers\Admin\HomeController; 
use App\Http\Controllers\Admin\ProductController; 
use App\Http\Controllers\Admin\ProductListController; 

Route::get('/', function () {
    return view('index');
});

// admin 
Route::prefix('admin')->group(function () {

    // Route::middleware('auth:admin')->get('/', [AuthController::class, 'dashboard'])->name('admin');
    // Route::get('/', [AuthController::class, 'showLoginForm'])->name('admin.index'); 
    // Route::post('/login', [AuthController::class, 'login'])->name('admin.login.submit'); 
    // Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout'); 

    // Route::get('', [HomeController::class, 'index'])->name('admin');
    Route::get('', [HomeController::class, 'index'])->name('admin.index');
    Route::prefix('product')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create',  [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
        Route::get('/get-category-id', [ProductController::class, 'getCategoryId'])->name('get-category-id');
        Route::get('/get-category-id-warehouse', [ProductController::class, 'getCategoryIdWarehouse'])->name('get-category-id-warehouse');
    });
});