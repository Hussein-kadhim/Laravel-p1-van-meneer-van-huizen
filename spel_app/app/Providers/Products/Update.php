<?php

namespace App\Providers\Products;

use App\Models\Product;
use Illuminate\Http\Request;

class Update
{
    public function update(Request $request, int $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|string|max:45',
            'description' => 'sometimes|string',
            'category_id' => 'sometimes|integer|exists:categories,id',
        ]);

        $product->update($validated);

        if ($request->wantsJson()) {
            return response()->json($product);
        }

        return redirect()->back()
            ->with('success', 'Product succesvol bijgewerkt!');
    }
}
