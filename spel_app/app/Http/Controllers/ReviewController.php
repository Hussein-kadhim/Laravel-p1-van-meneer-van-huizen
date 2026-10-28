<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::with(['product', 'user'])->get();
        $products = \App\Models\Product::all();
        $users = \App\Models\User::all();

        return view('reviews.index', compact('reviews', 'products', 'users'));
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
            'comment' => 'required|string',
            'user_id' => 'required|integer|exists:users,id',
            'product_id' => 'required|integer|exists:products,id',
        ]);

        $review = Review::create($validated);

        if ($request->wantsJson()) {
            return response()->json($review, 201);
        }

        return redirect()->route('reviews.index')->with('success', 'Review succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $review = Review::with(['product', 'user'])->findOrFail($id);

        return view('reviews.show', compact('review'));
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
        $review = Review::findOrFail($id);

        $validated = $request->validate([
            'comment' => 'required|string',
        ]);

        $review->update($validated);

        if ($request->wantsJson()) {
            return $review;
        }

        return redirect()->route('reviews.index')->with('success', 'Review succesvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        if (request()->wantsJson()) {
            return response()->noContent();
        }

        return redirect()->route('reviews.index')->with('success', 'Review succesvol verwijderd!');
    }
}
