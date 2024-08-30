<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\FlareClient\View;
use App\Models\Producto;
use App\Models\Categoria;
use Spatie\LaravelIgnition\Recorders\DumpRecorder\DumpHandler;

class ProductoController extends Controller
{
    //
    // public function __invoke() {
        
    // }

    public function index() {
        $productos = Producto::all();
        return view('producto.productos', ["productos"=> $productos]);
    }
    
    public function crear() {
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('producto.creando', ['categorias' => $categorias]); // Pasar las categorías a la vista
    }
    public function show($id) {

        $produsto = Producto::findOrFail($id);
        return view('producto.verProducto',["datos"=> $produsto]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'Nombre' => 'required|string|max:255',
        'stock' => 'required|integer|min:0',
        'PrecioUnitario' => 'required|numeric|min:0',
        'Descripcion' => 'nullable|string|max:1000',
        'CategoriaID' => 'required|exists:categorias,id', // Validar que el ID de la categoría existe
    ]);

    Producto::create($validatedData);

    return redirect()->route('productos.index')->with('success', 'Producto creado exitosamente.');
}

    public function destroy(Producto $ProductoID) {
        //$producto = Producto::findOrFail($ProductoID);
        $ProductoID->delete();
        return redirect()->route('productos.index')->with('success', 'Se elimono.');
    }

    public function update() {
        
    }

}
