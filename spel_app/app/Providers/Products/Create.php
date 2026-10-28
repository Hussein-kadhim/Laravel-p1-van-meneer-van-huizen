<?php

namespace App\Providers\Products;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class Create
{
    public function create(Request $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->save();

        return redirect()->route('products.index')
            ->with('success', 'Product succesvol aangemaakt!');
    }
}
