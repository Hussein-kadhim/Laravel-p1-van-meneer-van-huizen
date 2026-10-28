<?php

namespace App\Http\Controllers;

use App\Interfaces\CRUDControllerInterface;
use App\Models\Category;
use App\Providers\Categories\Create;
use App\Providers\Categories\Delete;
use App\Providers\Categories\Get;
use App\Providers\Categories\Index;
use App\Providers\Categories\Update;
use Illuminate\Http\Request;

class CategoryController extends Controller implements CRUDControllerInterface
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $index = new Index;

        return $index->index();
    }

    /**
     * Display the specified resource (Week 2 opdracht).
     */
    public function get(int $id)
    {
        $get = new Get;

        return $get->get($id);
    }

    /**
     * Verwerk het aanmaken van een nieuwe categorie (Week 3).
     */
    public function create(Request $request)
    {
        $create = new Create();

        return $create->create($request);
    }

    /**
     * Store a newly created resource in storage.
     * Alias voor create – gebruikt door de resource route (POST /categories).
     */
    public function store(Request $request)
    {
        return $this->create($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        return $this->get((int) $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->get((int) $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $update = new Update;

        return $update->update($request, $id);
    }

    /**
     * Verwijder een categorie (Week 3).
     */
    public function delete(Request $request, int $id)
    {
        $delete = new Delete();

        return $delete->delete($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     * Alias voor delete – gebruikt door de resource route (DELETE /categories/{id}).
     */
    public function destroy(Request $request, $id)
    {
        return $this->delete($request, (int) $id);
    }
}
