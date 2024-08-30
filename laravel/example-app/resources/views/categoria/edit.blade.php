@extends('body.cuerpo')

@section('title', 'Creando Producto ')

@section('content')
<div class="container">
    <h1>Editar Categoría</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('categorias.update', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $categoria->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $categoria->descripcion }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Categoría</button>
    </form>
</div>




@endsection()