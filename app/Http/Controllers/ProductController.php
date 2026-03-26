<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
{
    $query = Product::with('category');

    //  Search theo tên
    if ($request->filled('keyword')) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    //  Lọc theo category
    if ($request->filled('category') && $request->category != 'all') {
        $query->where('category_id', $request->category);
    }

    // Lọc theo giá (gần đúng)
    if ($request->filled('price')) {
        $price = $request->price;

        $query->whereBetween('price', [
            $price - 100000,
            $price + 100000
        ]);
    }

    //  Sắp xếp
    if ($request->sort == 'price_asc') {
        $query->orderBy('price', 'asc');
    } elseif ($request->sort == 'price_desc') {
        $query->orderBy('price', 'desc');
    }

    $products = $query->get();
    $categories = Category::all();

    return view('products.trangchu', compact('products', 'categories'));
}



    //  Form thêm
public function create()
{
    $categories = Category::all();
    return view('products.create', compact('categories'));
}

// Lưu sản phẩm
public function store(Request $request)
{
    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'stock' => $request->stock
    ]);

    return redirect('/products')->with('success', 'Thêm thành công');
}
public function show($id)
{
    $product = Product::with('category')->findOrFail($id);

    return view('products.show', compact('product'));
}
//  Form sửa
public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();

    return view('products.edit', compact('product', 'categories'));
}

//  Update
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $product->update([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'stock' => $request->stock
    ]);

    return redirect('/products')->with('success', 'Cập nhật thành công');
}

// Xóa
public function destroy($id)
{
    Product::destroy($id);
    return redirect('/products')->with('success', 'Xóa thành công');
}
}
