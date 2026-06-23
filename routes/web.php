<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;

// Guest Route
Route::middleware('guest')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    });

    // Register
    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/post-register', [AuthController::class, 'post_register'])
        ->name('post.register');

    // Login
    Route::post('/post-login', [AuthController::class, 'login']);
});


// USER
Route::group([], function () {

    Route::get('/user', [UserController::class, 'index'])
        ->name('user.dashboard');

    Route::get('/user-logout', [AuthController::class, 'user_logout'])
        ->name('user.logout');
});


// ADMIN
Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

Route::get('/product', [ProductController::class, 'index'])
    ->name('admin.product');

Route::get('/admin-logout', [AuthController::class, 'admin_logout'])
    ->name('admin.logout');