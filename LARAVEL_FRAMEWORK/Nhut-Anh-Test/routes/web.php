<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Guest - Chưa đăng nhập mới vào được
Route::middleware('guest')->group(function () {
    Route::get('/login', function() { return view('auth.login'); })->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', function() { return view('auth.register'); })->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Auth - Đã đăng nhập mới vào được
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Quản lý User (Chỉ Admin) - Nhựt làm
    Route::resource('users', UserController::class);

    // CRUD Sản phẩm - Ngọc Anh làm
    Route::resource('products', ProductController::class);
});


// Quản lý User (Chỉ Admin) 
Route::middleware(['auth'])->group(function () {
    // Route hiển thị danh sách (cái bảng bạn đã làm)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Route xử lý xóa
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    // Route thêm user (nếu bạn nhấn vào nút "+ Thêm User" màu xanh)
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});
