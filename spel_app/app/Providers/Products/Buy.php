<?php

namespace App\Providers\Products;

use App\Models\Order;
use App\Models\Orderrow;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Buy
{
    public function buy(Request $request, int $id)
    {
        $product = Product::findOrFail($id);

        $userId = Auth::id() ?? (User::where('email', 'klant@spelapp.nl')->value('id') ?? 1);

        $order = Order::create([
            'orderdate' => now(),
            'user_id' => $userId,
            'status' => 1,
        ]);

        Orderrow::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
        ]);

        return redirect()->route('products.show', $product->id)
            ->with('success', 'Gefeliciteerd met je aankoop van "'.$product->name.'"! Bestelling #'.$order->id.' is succesvol geplaatst.');
    }
}
