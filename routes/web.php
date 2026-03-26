<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// Route chính cho danh sách, tìm kiếm, lọc
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Route chi tiết
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Route xóa
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


// Route trang chủ