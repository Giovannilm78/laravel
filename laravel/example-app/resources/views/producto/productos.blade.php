@extends('body.cuerpo')

@section('title', 'Producto '.$productos)

@section('content')

@include('partials.navbar')


<div class="container">
  <h1>PRODUCTOS</h1>
  <hr>
  <a href="{{ route('productos.crear') }}" class="btn btn-primary">Agregar Producto</a>
  <hr>
  <h2>LISTA DE PRODUCTOS</h2>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Stock</th>
        <th scope="col">Precio Unitario</th>
        <th scope="col">Descripción</th>
        <th scope="col">Categoría</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($productos as $producto)
      <tr>
        <th scope="row">{{ $loop->iteration }}</th>
        <td>{{ $producto->Nombre }}</td>
        <td>{{ $producto->stock }}</td>
        <td>{{ $producto->PrecioUnitario }}</td>
        <td>{{ $producto->Descripcion }}</td>
        <td>{{ $producto->categoria->nombre ?? 'N/A' }}</td> <!-- Mostrar nombre de la categoría -->
        <td>
          <a href="{{ route('productos.edit', $producto->ProductoID) }}" class="btn btn-primary">Editar</a>
          <form action="{{ route('productos.destroy', $producto->ProductoID) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

    
    
@endsection()