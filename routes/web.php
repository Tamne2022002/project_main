<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Admin\HomeController; 
use App\Http\Controllers\Admin\ProductController; 
use App\Http\Controllers\Admin\ProductListController; 

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('home');
Route::get('/adminlogout', [HomeController::class, 'logoutAdmin'])->name('admin.logout');

Route::middleware(['auth', 'user-access:admin'])->group(function () {  
    Route::prefix('admin')->group(function () { 
        Route::get('', [HomeController::class, 'index'])->name('admin.index');

        /* Category */
        Route::prefix('categories')->group(function () {
            Route::get('', [ProductListController::class, 'index'])->name('productList.index');
            Route::get('/create', [ProductListController::class, 'create'])->name('productList.create');
            Route::post('/store', [ProductListController::class, 'store'])->name('productList.store');
            Route::get('/edit/{id}', [ProductListController::class, 'edit'])->name('productList.edit');
            Route::post('/update/{id}', [ProductListController::class, 'update'])->name('productList.update');
            Route::get('/delete/{id}', [ProductListController::class, 'delete'])->name('productList.delete');
        });

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
});
 