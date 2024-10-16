<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\HomeController; 
use App\Http\Controllers\ProductController; 
use App\Http\Controllers\ProductListController; 

Route::get('/', function () {
    return view('index');
});

// admin
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
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