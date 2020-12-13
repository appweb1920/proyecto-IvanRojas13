@extends('layout')
@section('content')
<style>
    .push-top {
    margin-top: 20px;
    }
    
</style>

<div class="push-top">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div><br />
    @endif
    <h1>{{$cliente->nombre}} {{$cliente->apellido}}</h1>
    <h3>Debe: ${{$cliente->deuda}}.00</h3>

    <table class="table">
        <thead>
            <tr class="table">
                <td>Producto</td>
                <td>Precio</td>
            </tr>
        </thead>
        <tbody>
        @foreach($producto as $productos)
            <tr>
                <td>{{$productos->nombre}}</td>
                <td>{{$productos->precioVenta}}</td>
            </tr>
            @endforeach
            <tr>
                <td>{{$cliente->productoRelacionado->nombre}}</td>
                <td>{{$cliente->productoRelacionado->precioVenta}}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection