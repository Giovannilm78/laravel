@extends('body.cuerpo') <!-- Asegúrate de que 'body.cuerpo' apunta al archivo correcto -->

@section('title', 'Lista de Ventas')

@section('content')
@include('partials.navbar')
<div class="container">
    <h1>Ventas</h1>
    <a href="{{ route('ventas.create') }}" class="btn btn-primary">Nueva Venta</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>Fecha</th>
                <th>Producto</th>
                <th>Cliente</th>
                <th>Cantidad</th>
                <th>Costo Totaaaaaaaaaaaaal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
            <tr>
                <td>{{ $venta->VentaID }}</td>
                <td>{{ $venta->fecha_venta }}</td>
                <td>{{ $venta->producto->Nombre }}</td>
                <td>{{ $venta->nombre_cliente }}</td>
                <td>{{ $venta->cantidad }}</td>
                <td>{{ $venta->costo_total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
