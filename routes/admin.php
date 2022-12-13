<?php

use App\Http\Controllers\Admin\OrderItemController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth:admin'], 'namespace' => 'App\Http\Controllers\Admin'], function () {

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

        Route::get('orders/{order:order_number}/orderItems', [OrderItemController::class, 'index'])->name('order.items');
        Route::resource('orders', OrderController::class);

        Route::get('settings/index', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('settings.index');
        Route::PUT('settings/update', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    });
});
