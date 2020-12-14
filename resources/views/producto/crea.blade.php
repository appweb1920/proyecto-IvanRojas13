@extends('layout')
@section('content')

<style>
.container {
      max-width: 450px;
    }

    .push-top {
    margin-top: 20px;
    }
    
</style>

<div class="card push-top">
    <div class="card-header">
        Crea Nuevo Producto
    </div>

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <form method="post" action="{{ route('productos.store') }}">
            <div class="form-group">
                @csrf
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre"/>
            </div>
            <div class="form-group">
                <label for="descripcion">Cantidad</label>
                <input type="text" class="form-control" name="cantidad"/>
            </div>
            <div class="form-group">
                <label for="numPiezas">Precio a la Venta</label>
                <input type="text" class="form-control" name="precioVenta"/>
            </div>
            <div class="form-group">
                <label for="costoPieza">Precio de Compra</label>
                <input type="text" class="form-control" name="precioCompra"/>
            </div>
            <div class="form-group">
                <label for="costoPieza">Proveedor</label>
                <input type="text" class="form-control" name="proveedor"/>
            </div>
            <button type="submit" class="btn btn-block btn-success">Guardar</button>
        </form>
    </div>
</div>
@endsection