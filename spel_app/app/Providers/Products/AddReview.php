<?php

namespace App\Providers\Products;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddReview
{
    public function addReview(Request $request, int $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $userId = Auth::id() ?? (User::where('email', 'klant@spelapp.nl')->value('id') ?? 1);

        Review::create([
            'comment' => $validated['comment'],
            'user_id' => $userId,
            'product_id' => $product->id,
        ]);

        return redirect()->route('products.show', $product->id)
            ->with('success', 'Bedankt! Je review is succesvol geplaatst.');
    }
}
