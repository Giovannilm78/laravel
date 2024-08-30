@extends('body.cuerpo')

@section('title', 'Creando Producto ')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Editar Producto</h2>
    <form action="{{ route('productos.update', $producto->ProductoID) }}" method="POST">
        @csrf
        @method('PUT') <!-- Cambia el método a PUT -->
        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ $producto->Nombre }}" placeholder="Ingrese el nombre del producto" required>
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}" placeholder="Ingrese la cantidad en stock" required>
        </div>
        <div class="form-group">
            <label for="precio_unitario">Precio Unitario</label>
            <input type="number" step="0.01" class="form-control" id="PrecioUnitario" name="PrecioUnitario" value="{{ $producto->PrecioUnitario }}" placeholder="Ingrese el precio unitario" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3" placeholder="Ingrese la descripción del producto" required>{{ $producto->Descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="categoria">Categoría</label>
            <select class="form-control" id="CategoriaID" name="CategoriaID" required>
                <option value="">Selecciona una categoría</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ $producto->CategoriaID == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
    



@endsection()