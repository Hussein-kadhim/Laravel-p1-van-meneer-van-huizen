<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();
        $roles = \App\Models\Role::all();

        return view('users.index', compact('users', 'roles'));
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
            'email' => 'required|email|max:45|unique:users,email',
            'password' => 'required|string|min:6|max:75',
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        $user = User::create($validated);

        if ($request->wantsJson()) {
            return response()->json($user, 201);
        }

        return redirect()->route('users.index')->with('success', 'Gebruiker succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::with(['role', 'orders', 'reviews.product'])->findOrFail($id);

        return view('users.show', compact('user'));
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
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:45',
            'email' => 'required|email|max:45|unique:users,email,'.$user->id,
            'role_id' => 'required|integer|exists:roles,id',
        ]);

        if ($request->filled('password')) {
            $validated['password'] = Hash::make($request->password);
        }

        $user->update($validated);

        if ($request->wantsJson()) {
            return $user;
        }

        return redirect()->route('users.index')->with('success', 'Gebruiker succesvol bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::withCount(['orders', 'reviews'])->findOrFail($id);

        if ($user->orders_count > 0) {
            if (request()->wantsJson()) {
                return response()->json(['error' => 'Gebruiker kan niet worden verwijderd omdat deze nog gekoppelde bestellingen heeft.'], 422);
            }

            return redirect()->route('users.index')->with('error', 'Gebruiker kan niet worden verwijderd omdat deze nog gekoppelde bestellingen heeft.');
        }

        $user->reviews()->delete();
        $user->delete();

        if (request()->wantsJson()) {
            return response()->noContent();
        }

        return redirect()->route('users.index')->with('success', 'Gebruiker succesvol verwijderd!');
    }
}
