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
        if ($request->keyword) {
            $query->where('name', 'like', '%' . $request->keyword . '%');
        }

        // Lọc theo category
        if ($request->category && $request->category != 'all') {
            $query->where('category_id', $request->category);
        }

        //  Sắp xếp
        if ($request->sort == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->get();
        $categories = Category::all();

        return view('product.trangchu', compact('products', 'categories'));
    }
}