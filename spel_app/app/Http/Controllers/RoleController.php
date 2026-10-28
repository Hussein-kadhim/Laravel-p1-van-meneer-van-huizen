<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::with('users')->get();

        return view('roles.index', compact('roles'));
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
            'name' => 'required|string|max:45',
        ]);

        $role = Role::create($validated);

        if ($request->wantsJson()) {
            return response()->json($role, 201);
        }

        return redirect()->route('roles.index')->with('success', 'Rol succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $role = Role::with('users')->findOrFail($id);

        return view('roles.show', compact('role'));
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
        $role = Role::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:45',
        ]);

        $role->update($validated);

        if ($request->wantsJson()) {
            return $role;
        }

        return redirect()->route('roles.index')->with('success', 'Rol succesvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $role = Role::withCount('users')->findOrFail($id);

        if ($role->users_count > 0) {
            if (request()->wantsJson()) {
                return response()->json(['error' => 'Rol kan niet worden verwijderd omdat er nog gebruikers aan gekoppeld zijn.'], 422);
            }

            return redirect()->route('roles.index')->with('error', 'Rol kan niet worden verwijderd omdat er nog gebruikers aan gekoppeld zijn.');
        }

        $role->delete();

        if (request()->wantsJson()) {
            return response()->noContent();
        }

        return redirect()->route('roles.index')->with('success', 'Rol succesvol verwijderd!');
    }
}
