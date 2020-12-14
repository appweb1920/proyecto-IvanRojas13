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
    <table class="table">
        <thead>
            <tr class="table">
                <td>ID</td>
                <td>Nombre</td>
                <td>Cantidad</td>
                <td>Precio de venta</td>
                <td>Precio de compra</td>
                <td>Proveedor</td>
                <td class="text-center">Acción</td>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $productoss)
            <tr>
                <td>{{$productoss->id}}</td>
                <td>{{$productoss->nombre}}</td>
                <td>{{$productoss->cantidad}}</td>
                <td>{{$productoss->precioVenta}}</td>
                <td>{{$productoss->precioCompra}}</td>
                <td>{{$productoss->proveedor}}</td>
                <td class="text-center">
                    <a href="{{route('productos.edit', $productoss->id)}}" class="btn btn-warning btn-sm"">Edita</a>
                    <form action="{{route('productos.destroy', $productoss->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"" type="submit">Elimina Producto</button>
                    </form>
                </td>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection