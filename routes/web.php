<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::get('/products', [ProductController::class, 'index']);Route::get('/products/create', [ProductController::class, 'create']);
Route::post('/products/store', [ProductController::class, 'store']);

Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
Route::post('/products/update/{id}', [ProductController::class, 'update']);

Route::get('/products/delete/{id}', [ProductController::class, 'destroy']);
Route::get('/products/{id}', [ProductController::class, 'show']);
// --- GUEST: Chưa đăng nhập mới vào được ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
Route::get('/admin/user', [UserController::class, 'index']);
// --- AUTH: Đã đăng nhập mới vào được ---
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Quản lý User - Nhựt làm (Resource đã bao gồm: index, create, store, edit, update, destroy)
    Route::resource('users', UserController::class);

    // CRUD Sản phẩm - Ngọc Anh làm
    Route::resource('products', ProductController::class);
});
