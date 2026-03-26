<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Hàm hiển thị danh sách + Tìm kiếm + Lọc + Sắp xếp
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Logic Tìm kiếm theo tên
        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->search . '%');
        }

        // Logic Lọc theo loại
        if ($request->filled('category_id') && $request->category_id != 'all') {
            $query->where('category_id', $request->category_id);
        }

        // Logic Lọc theo giá tối đa
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Logic Sắp xếp
        $sort = $request->get('sort', 'asc');
        $query->orderBy('price', $sort);

        $products = $query->get();
        $categories = Category::all();

        return view('products.index', compact('products', 'categories'));
    }

    // Hàm hiển thị trang Chi tiết sản phẩm
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Hàm xóa sản phẩm
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Xóa thành công!');
    }
}