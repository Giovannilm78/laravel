@extends('body.cuerpo')

@section('title', 'Ver Producto '.$datos)

@section('content')
    {{-- <h1>ver producto {{$datos}}</h1> --}}
    {{-- <div class="alert alert-primary" role="alert">
        A simple primary alert—check it out!
      </div> --}}

      {{-- <div class="container mt-5">
        <h2 class="mb-4">Editar Producto</h2>
        <form action="{{ route('productos.edit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" class="form-control" id="Nombre"  name="Nombre" placeholder="Ingrese el nombre del producto" required value="{{$datos->Nombre}}">
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Ingrese la cantidad en stock" required value="{{$datos->stock}}">
            </div>
            <div class="form-group">
                <label for="precio_unitario">Precio Unitario</label>
                <input type="number" step="0.01" class="form-control" id="PrecioUnitario" name="PrecioUnitario" placeholder="Ingrese el precio unitario" required value="{{$datos->PrecioUnitario}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3" placeholder="Ingrese la descripción del producto" required value="{{$datos->Descripcion}}"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Producto</button>
        </form>
    </div> --}}
    <div class="container mt-5">
        <h2 class="mb-4">Editar Producto</h2>
        <form action="{{ route('productos.edit', $datos->ProductoID) }}" method="POST">
            @csrf
            @method('PUT') <!-- Cambiar el método a PUT para actualización -->
            <div class="form-group">
                <label for="nombre">Nombre del Producto</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre" placeholder="Ingrese el nombre del producto" required value="{{ old('Nombre', $datos->Nombre) }}">
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" placeholder="Ingrese la cantidad en stock" required value="{{ old('stock', $datos->stock) }}">
            </div>
            <div class="form-group">
                <label for="precio_unitario">Precio Unitario</label>
                <input type="number" step="0.01" class="form-control" id="PrecioUnitario" name="PrecioUnitario" placeholder="Ingrese el precio unitario" required value="{{ old('PrecioUnitario', $datos->PrecioUnitario) }}">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="Descripcion" name="Descripcion" rows="3" placeholder="Ingrese la descripción del producto" required>{{ old('Descripcion', $datos->Descripcion) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>
    


@endsection()
