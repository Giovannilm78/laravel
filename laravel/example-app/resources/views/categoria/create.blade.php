@extends('body.cuerpo') <!-- Asegúrate de que 'body.cuerpo' apunta al archivo correcto -->

@section('title', 'Registrar Venta') <!-- Opcionalmente, puedes agregar un título -->

@section('content')<!-- Cambiado de 'cuerpo' a 'content' -->
@include('partials.navbar')

<div class="container">
    <h1>Crear Categoría</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('categorias.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Categoría</button>
    </form>
</div>


@endsection
