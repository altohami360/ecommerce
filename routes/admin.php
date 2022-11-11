<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\admin\AttributeValueController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

Route::group(['middleware' => ['auth:admin']], function () {

    Route::prefix('admin')->group(function () {

        Route::get('/dashboard', DashboardController::class)->name('dashboard');

        Route::resource('users', UserController::class);

        Route::resource('admins', AdminController::class);

        Route::resource('products', ProductController::class);
        
        Route::resource('categories', CategoryController::class);

        Route::resource('brands', BrandController::class);

        Route::resource('attributes', AttributeController::class);

        Route::get('values/{attribute_id}',[AttributeValueController::class, 'index'])->name('values.index');

        Route::get('settings/index', [SettingController::class, 'index'])->name('settings.index');
        Route::PUT('settings/update', [SettingController::class, 'update'])->name('settings.update');
    });
});
