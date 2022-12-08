<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\admin\AttributeValueController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductAttributeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

Route::group(['middleware' => ['auth:admin']], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', DashboardController::class)->name('dashboard');

        Route::resource('users', UserController::class);

        Route::resource('admins', AdminController::class);

        Route::prefix('product/{product}/')->group(function () {

            Route::get('attribtues', [ProductAttributeController::class, 'index'])->name('product.attribute');
            Route::post('attribtues', [ProductAttributeController::class, 'store'])->name('store.product.attribute');
            Route::delete('attribtues/{productAttribute}', [ProductAttributeController::class, 'destroy'])->name('delete.product.attribute');

            Route::get('images', [ProductImageController::class, 'index'])->name('product.image');
            Route::post('images', [ProductImageController::class, 'store'])->name('store.product.image');
            Route::delete('images/{image}', [ProductImageController::class, 'destroy'])->name('delete.product.image');
        });
        Route::resource('products', ProductController::class);

        Route::resource('categories', CategoryController::class);

        Route::resource('brands', BrandController::class)->except('show');

        Route::resource('attributes', AttributeController::class)->except('show');

        Route::get('settings/index', [SettingController::class, 'index'])->name('settings.index');
        Route::PUT('settings/update', [SettingController::class, 'update'])->name('settings.update');
    });
});
