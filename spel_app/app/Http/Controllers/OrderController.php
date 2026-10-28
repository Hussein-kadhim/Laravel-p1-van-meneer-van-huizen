<?php

namespace App\Http\Controllers;

use App\Http\Interfaces\ControllerInterface;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller implements ControllerInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with(['orderrows.product', 'user'])->get();
        $users = \App\Models\User::all();

        return view('orders.index', compact('orders', 'users'));
    }

    /**
     * Display the specified resource by ID (ControllerInterface implementation).
     */
    public function get(int $id)
    {
        return $this->show($id);
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
            'orderdate' => 'required|date',
            'user_id' => 'required|integer|exists:users,id',
            'status' => 'required|integer',
        ]);

        $order = Order::create($validated);

        if ($request->wantsJson()) {
            return response()->json($order, 201);
        }

        return redirect()->route('orders.index')->with('success', 'Bestelling succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Order::with(['orderrows.product', 'user'])->findOrFail($id);

        return view('orders.show', compact('order'));
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
    public function update(Request $request, int $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'orderdate' => 'required|date',
            'status' => 'required|integer',
        ]);

        $order->update($validated);

        if ($request->wantsJson()) {
            return $order;
        }

        return redirect()->route('orders.index')->with('success', 'Bestelling succesvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $order = Order::findOrFail($id);
        $order->orderrows()->delete();
        $order->delete();

        if (request()->wantsJson()) {
            return response()->noContent();
        }

        return redirect()->route('orders.index')->with('success', 'Bestelling succesvol verwijderd!');
    }
}

