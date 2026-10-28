<?php

namespace App\Http\Controllers;

use App\Models\Price;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prices = Price::with('product')->get();
        $products = \App\Models\Product::all();

        return view('prices.index', compact('prices', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'price' => 'required|numeric',
            'effdate' => 'required|date',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $price = Price::create($validated);

        if ($request->wantsJson()) {
            return response()->json($price, 201);
        }

        return redirect()->route('prices.index')->with('success', 'Prijs succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $price = Price::with('product')->findOrFail($id);

        return view('prices.show', compact('price'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $price = Price::findOrFail($id);

        $validated = $request->validate([
            'price' => 'required|numeric',
            'effdate' => 'required|date',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $price->update($validated);

        if ($request->wantsJson()) {
            return $price;
        }

        return redirect()->route('prices.index')->with('success', 'Prijs succesvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $price = Price::findOrFail($id);
        $price->delete();

        if (request()->wantsJson()) {
            return response()->noContent();
        }

        return redirect()->route('prices.index')->with('success', 'Prijs succesvol verwijderd!');
    }
}
