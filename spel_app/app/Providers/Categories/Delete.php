<?php

namespace App\Providers\Categories;

use App\Models\Category;
use Illuminate\Http\Request;

class Delete
{
    public function delete(Request $request, int $id)
    {
        $category = Category::withCount('products')->findOrFail($id);

        if (!$category->canDelete()) {
            return redirect()
                ->route('categories.index')
                ->with('error', 'Categorie kan niet worden verwijderd omdat er nog producten aan gekoppeld zijn.');
        }

        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Categorie succesvol verwijderd!');
    }
}
