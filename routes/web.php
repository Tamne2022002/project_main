<?php

use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\HomeController; 

Route::get('/', function () {
    return view('index');
});
// Route::get('/admin', function () {
//     return view('admin.admin');
// });

Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin');
// Route::get('/admin/index', [HomeController::class, 'adminHome'])->name('admin');
