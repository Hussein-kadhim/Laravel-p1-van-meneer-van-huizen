<?php

namespace App\Http\Controllers;

use App\Interfaces\CRUDControllerInterface;
use App\Models\Product;
use App\Providers\Products\AddReview;
use App\Providers\Products\Buy;
use App\Providers\Products\Create;
use App\Providers\Products\Delete;
use App\Providers\Products\Get;
use App\Providers\Products\Index;
use App\Providers\Products\Update;
use Illuminate\Http\Request;

class ProductController extends Controller implements CRUDControllerInterface
{
    /**
     * Display a listing of the resource (Spellen bekijken).
     */
    public function index(?Request $request = null)
    {
        $index = new Index;

        return $index->index($request);
    }

    /**
     * Display the specified resource (Details van een spel bekijken).
     */
    public function show(Request $request, $id)
    {
        $get = new Get;

        return $get->get((int) $id, $request);
    }

    /**
     * Display the specified resource (alias voor show/get).
     */
    public function get(int $id, ?Request $request = null)
    {
        $get = new Get;

        return $get->get($id, $request);
    }

    /**
     * Review achterlaten over een spel.
     */
    public function addReview(Request $request, $id)
    {
        $addReview = new AddReview;

        return $addReview->addReview($request, (int) $id);
    }

    /**
     * Een spel kopen (Bestelling plaatsen).
     */
    public function buy(Request $request, $id)
    {
        $buy = new Buy;

        return $buy->buy($request, (int) $id);
    }

    /**
     * Verwerk het aanmaken van een nieuw product (Week 3).
     */
    public function create(Request $request)
    {
        $create = new Create();

        return $create->create($request);
    }

    /**
     * Store a newly created resource in storage.
     * Alias voor create – gebruikt door de resource route (POST /products).
     */
    public function store(Request $request)
    {
        return $this->create($request);
    }

    /**
     * Show the form for editing the specified resource (Admin).
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);

        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage (Admin).
     */
    public function update(Request $request, int $id)
    {
        $update = new Update;

        return $update->update($request, $id);
    }

    /**
     * Verwijder een product (Week 3).
     */
    public function delete(Request $request, int $id)
    {
        $delete = new Delete();

        return $delete->delete($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     * Alias voor delete – gebruikt door de resource route (DELETE /products/{id}).
     */
    public function destroy(Request $request, $id)
    {
        return $this->delete($request, (int) $id);
    }
}