<?php

namespace App\Http\Controllers;

use App\Models\Orderrow;
use Illuminate\Http\Request;

class OrderrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Orderrow::with(['order', 'product'])->get();
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
            'order_id' => 'required|integer|exists:order,id',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        return Orderrow::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Orderrow::findOrFail($id);
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
        $orderrow = Orderrow::findOrFail($id);

        $validated = $request->validate([
            'order_id' => 'sometimes|integer|exists:order,id',
            'product_id' => 'sometimes|integer|exists:products,id',
        ]);

        $orderrow->update($validated);

        return $orderrow;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $orderrow = Orderrow::findOrFail($id);
        $orderrow->delete();

        return response()->noContent();
    }
}
