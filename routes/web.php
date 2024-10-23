<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Admin\HomeController; 
use App\Http\Controllers\Admin\ProductController; 
use App\Http\Controllers\Admin\ProductListController; 
use App\Http\Controllers\Admin\PublisherController; 
use App\Http\Controllers\Admin\DashboardController; 

use App\Http\Controllers\Client\CCartController;
// use App\Http\Controllers\Client\CChangePasswordController;
use App\Http\Controllers\Client\CInfoController;
use App\Http\Controllers\Client\CNewsController;
use App\Http\Controllers\Client\COrderController;
use App\Http\Controllers\Client\CProductController;
// use App\Http\Controllers\Client\CRateController;
// use App\Http\Controllers\Client\CSearchController;
use App\Http\Controllers\Client\CUserController;
use App\Http\Controllers\Client\CHomeController;

Route::get('/sign-in', [CUserController::class, 'clientLogin'])->name('user.login');
Route::post('check-login', [CUserController::class, 'postlogin'])->name('user.postlogin');
Route::get('/register', [CUserController::class, 'clientRegister'])->name('user.register');
Route::post('check-register', [CUserController::class, 'postregister'])->name('user.postregister');
Route::get('logout', [CUserController::class, 'logout'])->name('user.logout');

Route::prefix('/')->group(function () {
    /* Index */
    Route::controller(CHomeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get-category-data/{categoryId}', [CHomeController::class, 'getCategoryData'])->name('get-category-data');
        Route::get('/publisher/{id}', [CHomeController::class, 'publisherproduct'])->name('publisher.publisherproduct');
        Route::get('/categoryid/{id}', [CHomeController::class, 'categoryidproduct'])->name('categoryid.categoryidproduct');
    });
    /* Search */
    Route::controller(CSearchController::class)->group(function () {
        Route::get('/search', 'index')->name('search');
    });
  
    
    /* News */
    Route::controller(CNewsController::class)->group(function () {
        Route::get('/news', 'index')->name('news');
        Route::get('/news/{id}', [CNewsController::class, 'detail'])->name('news.detail');
    });
    /* Product */
    Route::controller(CProductController::class)->group(function () {
        Route::get('/product', 'index')->name('product');
        Route::get('/product/{id}', [CProductController::class, 'detail'])->name('product.detail');
        Route::get('/product/{id}/buy-now', 'add')->name('product.add');
    });

    /* Cart */
    Route::controller(CCartController::class)->group(function () {
        Route::get('/cart', 'index')->name('user.cart');
        Route::get('/cart/add/{id?}&{quantity?}', 'add_index')->name('add_index.cart');
        Route::get('/cart/update_quantity/{id?}&{method?}', 'changeQuantity')->name('update_quantity.cart');
        Route::get('/cart/delete/{id}', 'delete')->name('delete.cart');
        //Route::patch('/cart/update/{id}', 'update_qty')->name('update.cart');

    });

    /* Info */
    // Route::controller(CInfoController::class)->group(function () {
    //     Route::get('user-info', 'index')->name('user.info');
    //     Route::post('user-info/update', 'update')->name('user.info.update');
    //     Route::delete('user-info/delete', 'delete')->name('user.info.delete');
    // });

    /*Order*/
    // Route::controller(COrderController::class)->group(function () {
    //     Route::get('order', 'index')->name('user.order');
    //     Route::get('order/{id}', 'detail')->name('user.order.detail');
    // });

    /*Address Change*/
    /*Route::controller(CChangeAddressController::class)->group(function() {
    Route::get('change-address', 'index')->name('user.changeaddress.index');
    Route::post('change-address/update', 'update')->name('user.changeaddress.update');
    });*/

    /*Password Change*/
    // Route::controller(CChangePasswordController::class)->group(function () {
    //     Route::get('change-password', 'index')->name('user.changepassword');
    //     Route::post('change-password/update', 'update')->name('user.changepassword.update');
    // });

    // /*Rate*/
    // Route::controller(CRateController::class)->group(function () {
    //     Route::get('rate', 'index')->name('user.rate');
    //     Route::get('/rate/{id}', 'rate')->name('user.rate.rate');
    //     Route::get('/rate/{id}/{rate_id}', 'detail')->name('user.rate.detail');
    //     Route::post('rate/store', 'store')->name('user.rate.store');
    // });

    /* PAYMENT */

    // Route::controller(PaymentController::class)->group(function () {
    //     Route::get('/payment', 'index')->name('user.payment');
    //     Route::post('/cod_payment', 'cod_payment')->name('cod');
    //     Route::post('/vnpay_payment', 'vnpay_payment')->name('vnpay');
    //     Route::post('/payment_return', 'combination')->name('combination');
    //     Route::get('/vnpay_return', 'return')->name('vnpay.return');
    // });

    /*VNPAY*/
    // Route::post('/vnpay_return', [PaymentController::class, 'return'])->name('vnpay.return');
});

Auth::routes();

Route::get('/admin', [HomeController::class, 'index'])->name('home');
Route::get('/adminlogout', [HomeController::class, 'logoutAdmin'])->name('admin.logout');

Route::middleware(['auth', 'user-access:admin'])->group(function () {  
    Route::prefix('admin')->group(function () { 
        Route::get('', [DashboardController::class, 'index'])->name('admin.dashboard.dashboard');
        Route::get('/dashboard/{month?}&{year}', [DashboardController::class, 'filter'])->name('ajax.dashboard');

 
        /* Publisher */
        Route::prefix('publisher')->group(function () {
            Route::get('', [PublisherController::class, 'index'])->name('publisher.index');
            Route::get('/create', [PublisherController::class, 'create'])->name('publisher.create');
            Route::post('/store', [PublisherController::class, 'store'])->name('publisher.store');
            Route::get('/edit/{id}', [PublisherController::class, 'edit'])->name('publisher.edit');
            Route::post('/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
            Route::get('/delete/{id}', [PublisherController::class, 'delete'])->name('publisher.delete');
        });

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

            /* Warehouse */
        Route::prefix('warehouse')->group(function () {
            Route::get('', [ProductController::class, 'warehouse'])->name('warehouse.index');
        });
    
    });
});
 