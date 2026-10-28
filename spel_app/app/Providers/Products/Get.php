<?php

namespace App\Providers\Products;

use App\Models\Product;
use Illuminate\Http\Request;

class Get
{
    public function get(int $id, ?Request $request = null)
    {
        $product = Product::with(['category', 'prices', 'reviews.user'])->findOrFail($id);

        if ($request && $request->wantsJson()) {
            return response()->json($product);
        }

        return view('products.show', compact('product'));
    }
}
