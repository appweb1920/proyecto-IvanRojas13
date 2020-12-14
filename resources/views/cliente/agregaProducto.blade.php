@extends('layout')
@section('content')

<style>
.container {
      max-width: 450px;
    }

    .push-top {
    margin-top: 20px;
    }

    button{
        margin-top: 20px;
    }
    
</style>

<div class="card push-top">
    <div class="card-header">
        Registra tu venta
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
        <form method="post" action="{{ route('clientes.updateProducto', $cliente->id) }}">
        <div class="form-group">
            @csrf
            @method('post')
            <select class="form-control" id="select" name="producto_id">
            @foreach($lista_productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
            @endforeach
            </select>
            <button type="submit" class="btn btn-block btn-success">Agrega producto</button>
        </form>
    </div>
</div>

@endsection