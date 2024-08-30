@extends('body.cuerpo') <!-- Asegúrate de que 'body.cuerpo' apunta al archivo correcto -->

@section('title', 'Registrar Venta') <!-- Opcionalmente, puedes agregar un título -->

@section('content')<!-- Cambiado de 'cuerpo' a 'content' -->
@include('partials.navbar')

<div class="container">
    <h1>Registrar Venta</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="ProductoID">Producto</label>
            <select name="ProductoID" id="ProductoID" class="form-control">
                @foreach ($productos as $producto)
                <option value="{{ $producto->ProductoID }}">{{ $producto->Nombre }} - Stock: {{ $producto->stock }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" class="form-control">
        </div>

        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Registrar Venta</button>
    </form>
</div>
@endsection
