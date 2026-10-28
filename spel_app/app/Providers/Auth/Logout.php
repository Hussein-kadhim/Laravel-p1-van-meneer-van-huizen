<?php

namespace App\Providers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout
{
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
