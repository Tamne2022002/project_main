<?php

use Illuminate\Support\Facades\Route; 
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\Admin\HomeController; 
use App\Http\Controllers\Admin\ProductController; 
use App\Http\Controllers\Admin\ProductListController; 
use App\Http\Controllers\Admin\PublisherController; 
use App\Http\Controllers\Admin\UserController; 
use App\Http\Controllers\Admin\MemberController; 
use App\Http\Controllers\Admin\RoleController; 
use App\Http\Controllers\Admin\DashboardController; 
use App\Http\Controllers\Admin\OrderController; 
use App\Http\Controllers\Admin\ImportOrderController; 
use App\Http\Controllers\Admin\SettingController; 
use App\Http\Controllers\Admin\PhotoController; 

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
Route::get('/sign-up', [CUserController::class, 'clientRegister'])->name('user.signup');
Route::post('check-register', [CUserController::class, 'postregister'])->name('user.postregister');
Route::get('logout', [CUserController::class, 'logout'])->name('client.user.logout');

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
    Route::controller(CInfoController::class)->group(function () {
        Route::get('user-info', 'index')->name('user.info');
        Route::post('user-info/update', 'update')->name('user.info.update');
        Route::delete('user-info/delete', 'delete')->name('user.info.delete');
    });

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
        
        /* Order */
        Route::prefix('order')->group(function () {
            Route::get('', [OrderController::class, 'index'])->name('order.index')->middleware('can:order-list');
            Route::get('/view/{id}', [OrderController::class, 'view'])->name('order.view')->middleware('can:order-view-edit');
        }); 

        /* Import_order */
        Route::prefix('import_order')->group(function () {
            Route::get('', [ImportOrderController::class, 'index'])->name('import_order.index')->middleware('can:import-order-list');
            Route::get('/create', [ImportOrderController::class, 'create'])->name('import_order.create')->middleware('can:import-order-add');
            Route::post('/store', [ImportOrderController::class, 'store'])->name('import_order.store')->middleware('can:import-order-view');
            Route::get('/delete/{id}', [ImportOrderController::class, 'delete'])->name('import_order.delete')->middleware('can:import-order-delete');
            Route::get('/view/{id}', [ImportOrderController::class, 'view'])->name('import_order.view');
            Route::get('/get-product-id', [ImportOrderController::class, 'getProductId'])->name('get-product-id]');
        });
 
        /* Publisher */
        Route::prefix('publisher')->group(function () {
            Route::get('', [PublisherController::class, 'index'])->name('publisher.index')->middleware('can:publisher-list');
            Route::get('/create', [PublisherController::class, 'create'])->name('publisher.create')->middleware('can:publisher-add');
            Route::post('/store', [PublisherController::class, 'store'])->name('publisher.store');
            Route::get('/edit/{id}', [PublisherController::class, 'edit'])->name('publisher.edit')->middleware('can:publisher-edit');
            Route::post('/update/{id}', [PublisherController::class, 'update'])->name('publisher.update');
            Route::get('/delete/{id}', [PublisherController::class, 'delete'])->name('publisher.delete')->middleware('can:publisher-delete');
        });

        /* Category */
        Route::prefix('categories')->group(function () { 
            Route::get('', [ProductListController::class, 'index'])->name('productList.index')->middleware('can:category-list');
            Route::get('/create', [ProductListController::class, 'create'])->name('productList.create')->middleware('can:category-add');
            Route::post('/store', [ProductListController::class, 'store'])->name('productList.store');
            Route::get('/edit/{id}', [ProductListController::class, 'edit'])->name('productList.edit')->middleware('can:category-edit');
            Route::post('/update/{id}', [ProductListController::class, 'update'])->name('productList.update');
            Route::get('/delete/{id}', [ProductListController::class, 'delete'])->name('productList.delete')->middleware('can:category-delete');
        });

        /* Product */
        Route::prefix('product')->group(function () {
            Route::get('', [ProductController::class, 'index'])->name('product.index')->middleware('can:product-list');
            Route::get('/create', [ProductController::class, 'create'])->name('product.create')->middleware('can:product-add');
            Route::post('/store', [ProductController::class, 'store'])->name('product.store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit')->middleware('can:product-edit');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete')->middleware('can:product-delete');
            Route::get('/get-category-id', [ProductController::class, 'getCategoryId'])->name('get-category-id');
            Route::get('/get-category-id-warehouse', [ProductController::class, 'getCategoryIdWarehouse'])->name('get-category-id-warehouse');        });

        /* User */
        Route::prefix('users')->group(function () {
            Route::get('', [UserController::class, 'index'])->name('users.index')->middleware('can:users-list');
            Route::get('/create', [UserController::class, 'create'])->name('users.create')->middleware('can:users-add');
            Route::post('/store', [UserController::class, 'store'])->name('users.store');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit')->middleware('can:users-edit');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
            Route::get('/delete/{id}', [UserController::class, 'delete'])->name('users.delete')->middleware('can:users-delete');
        });

        /* Member */
        Route::prefix('member')->group(function () {
            Route::get('', [MemberController::class, 'index'])->name('member.index')->middleware('can:member-list');
            Route::get('/create', [MemberController::class, 'create'])->name('member.create')->middleware('can:member-add');
            Route::post('/store', [MemberController::class, 'store'])->name('member.store');
            Route::get('/edit/{id}', [MemberController::class, 'edit'])->name('member.edit')->middleware('can:member-edit');
            Route::post('/update/{id}', [MemberController::class, 'update'])->name('member.update');
            Route::get('/delete/{id}', [MemberController::class, 'delete'])->name('member.delete')->middleware('can:member-delete');
        });

        /* Role */
        Route::prefix('roles')->group(function () {
            Route::get('', [RoleController::class, 'index'])->name('roles.index')->middleware('can:roles-list');
            Route::get('/create', [RoleController::class, 'create'])->name('roles.create')->middleware('can:roles-add');
            Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit')->middleware('can:roles-edit');
            Route::post('/update/{id}', [RoleController::class, 'update'])->name('roles.update');
            Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('roles.delete')->middleware('can:roles-delete');
        });

        Route::resource('slider', PhotoController::class)->except(['show', 'destroy']);
        Route::resource('banner', PhotoController::class)->except(['show', 'destroy']);
    

        /* Photo */
        Route::prefix('photo/{type}')->group(function () {
            Route::get('', [PhotoController::class, 'index'])->name('photo.index');
            Route::get('/create', [PhotoController::class, 'create'])->name('photo.create');
            Route::post('/store', [PhotoController::class, 'store'])->name('photo.store');
            Route::get('/edit/{id}', [PhotoController::class, 'edit'])->name('photo.edit');
            Route::post('/update/{id}', [PhotoController::class, 'update'])->name('photo.update');
            Route::get('/delete/{id}', [PhotoController::class, 'delete'])->name('photo.delete');
        });   
        Route::prefix('photo_static')->group(function () {
            Route::get('', [PhotoController::class, 'static'])->name('photo_static.index');
            Route::post('/store', [PhotoController::class, 'store'])->name('photo_static.store');
        });   

        /* Warehouse */
        Route::prefix('warehouse')->group(function () {
            Route::get('', [ProductController::class, 'warehouse'])->name('warehouse.index')->middleware('can:warehouse-list');
        });

        /* Setting */
        Route::get('setting', [SettingController::class, 'index'])->name('setting.index')->middleware('can:setting-list');
        Route::post('setting/update', [SettingController::class, 'update'])->name('setting.update')->middleware('can:setting-edit');
    
    });
});
 