<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    
    public function index()
    {
        $categories = Categories::all()->toArray();
        return view('categories', ['categories' => $categories]);
        // dd($categories);
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        Categories::create($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso!');
    }


    public function update(Request $request, $id)
    {
        $category = Categories::findOrFail($id);
        $category->update($request->all());
        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Categories::destroy($id);
        return redirect()->route('categorias.index')->with('success', 'Categoria removida com sucesso!');
    }
}
