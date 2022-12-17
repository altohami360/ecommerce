<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\Auth\AuthenticatedSessionController as AdminAuth;

Route::middleware('admin')->prefix('admin')->group(function() {

    Route::get('login', [AdminAuth::class, 'create'])
            ->middleware('guest:admin')
            ->name('admin.login');

    Route::post('login', [AdminAuth::class, 'store'])
            ->middleware('guest:admin');
    
    Route::post('logout', [AdminAuth::class, 'destroy'])
            ->middleware('auth:admin')
            ->name('admin.logout');

});


Route::get('register', [RegisteredUserController::class, 'create'])
        ->middleware('guest')
        ->name('register');

Route::post('register', [RegisteredUserController::class, 'store'])
        ->middleware('guest');

Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->middleware('guest')
        ->name('login');

Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->middleware('guest');

Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth')
        ->name('logout');