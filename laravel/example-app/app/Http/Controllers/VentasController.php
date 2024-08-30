<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        //dd($ventas);
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductoID' => 'required|exists:productos,ProductoID',
            'nombre_cliente' => 'required|string',
            'cantidad' => 'required|integer|min:1',
        ]);

        $producto = Producto::find($request->ProductoID);

        if ($producto->stock < $request->cantidad) {
            return redirect()->back()->withErrors('No hay suficiente stock para realizar la venta.');
        }

        $venta = new Venta();
        $venta->fecha_venta = now();
        $venta->ProductoID = $producto->ProductoID;
        $venta->nombre_cliente = $request->nombre_cliente;
        $venta->cantidad = $request->cantidad;
        $venta->precio_unitario = $producto->PrecioUnitario;
        $venta->costo_total = $producto->PrecioUnitario * $request->cantidad;
        $venta->save();

        // Actualizar el stock del producto
        $producto->stock -= $request->cantidad;
        $producto->save();

        return redirect()->route('ventas.index')->with('success', 'Venta realizada y stock actualizado.');
    }
}
