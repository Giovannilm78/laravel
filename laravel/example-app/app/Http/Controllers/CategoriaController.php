<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    // Mostrar una lista de categorías
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', compact('categorias'));
    }

    // Mostrar el formulario para crear una nueva categoría
    public function create()
    {
        return view('categoria.create');
    }

    // Almacenar una nueva categoría en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría creada exitosamente.');
    }

    // Mostrar el formulario para editar una categoría existente
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('categoria.edit', compact('categoria'));
    }

    // Actualizar una categoría existente en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
        ]);

        $categoria = Categoria::findOrFail($id);
        $categoria->update($request->all());

        return redirect()->route('categorias.index')->with('success', 'Categoría actualizada exitosamente.');
    }

    // Eliminar una categoría existente de la base de datos
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoría eliminada exitosamente.');
    }
}