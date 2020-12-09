@extends('layout')
@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
    <div class="card-header">
        Edicion
    </div>

    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <form method="post" action="{{ route('productos.update', $producto->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="nombre">Nuevo Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ $producto->nombre}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Cantidad</label>
                <input type="text" class="form-control" name="cantidad" value="{{ $producto->cantidad}}">
            </div>
            <div class="form-group">
                <label for="numPiezas">Precio Venta</label>
                <input type="text" class="form-control" name="precioVenta" value="{{ $producto->precioVenta}}">
            </div>
            <div class="form-group">
                <label for="costoPieza">Precio Compra</label>
                <input type="text" class="form-control" name="precioCompra" value="{{ $producto->precioCompra}}">
            </div>
            <div class="form-group">
                <label for="numPiezas">Proveedor</label>
                <input type="text" class="form-control" name="proveedor" value="{{ $producto->proveedor}}">
            </div>
            <button type="submit" class="btn btn-block btn-danger">Edita</button>
        </form>
    </div>
</div>
@endsection