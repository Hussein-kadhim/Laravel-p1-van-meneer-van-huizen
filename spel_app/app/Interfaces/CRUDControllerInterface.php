<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CRUDControllerInterface
{
    /**
     * Toon een overzicht van de resources (Index).
     */
    public function index();

    /**
     * Toon een specifiek resource op basis van ID (Get / Read).
     */
    public function get(int $id);

    /**
     * Verwerk het aanmaken van een nieuw resource (Create).
     */
    public function create(Request $request);

    /**
     * Werk een bestaand resource bij op basis van ID (Update).
     */
    public function update(Request $request, int $id);

    /**
     * Verwijder een resource op basis van ID (Delete).
     */
    public function delete(Request $request, int $id);
}
