<?php

namespace App\Providers\Products;

use App\Models\Product;
use Illuminate\Http\Request;

class Delete
{
    public function delete(Request $request, int $id)
    {
        $product = Product::withCount('orderRows')->findOrFail($id);

        if (!$product->canDelete()) {
            return redirect()
                ->route('products.index')
                ->with('error', 'Product kan niet worden verwijderd omdat er nog bestellingen aan gekoppeld zijn.');
        }

        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product succesvol verwijderd!');
    }
}
