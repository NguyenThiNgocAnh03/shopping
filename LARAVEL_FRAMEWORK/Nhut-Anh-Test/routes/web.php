<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

// --- TRANG CHỦ ---
Route::get('/', function () {
    return view('index');
});

// --- GUEST: Chưa đăng nhập mới vào được ---
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// --- AUTH: Đã đăng nhập mới vào được ---
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Quản lý User - Nhựt làm (Resource đã bao gồm: index, create, store, edit, update, destroy)
    Route::resource('users', UserController::class);

    // CRUD Sản phẩm - Ngọc Anh làm
    Route::resource('products', ProductController::class);
});
