<?php

namespace App\Providers\Products;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class Index
{
    public function index(?Request $request = null)
    {
        $products = Product::with(['category', 'prices'])->get();
        $categories = Category::all();

        if ($request && $request->wantsJson()) {
            return response()->json($products);
        }

        return view('products.index', compact('products', 'categories'));
    }
}