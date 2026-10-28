<?php

namespace App\Providers\Categories;

use App\Models\Category;
use Illuminate\Http\Request;

class Create
{
    public function create(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index')
            ->with('success', 'Categorie succesvol aangemaakt!');
    }
}
