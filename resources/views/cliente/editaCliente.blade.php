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
        <form method="post" action="{{ route('clientes.update', $cliente->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="nombre">Nuevo Nombre</label>
                <input type="text" class="form-control" name="nombre" value="{{ $cliente->nombre}}">
            </div>
            <div class="form-group">
                <label for="descripcion">Nuevo Apellido</label>
                <input type="text" class="form-control" name="apellido" value="{{ $cliente->apellido}}">
            </div>
            <div class="form-group">
                <label for="numPiezas">Nuevo Numero Telefonico</label>
                <input type="text" class="form-control" name="numTelefono" value="{{ $cliente->numTelefono}}">
            </div>
            <div class="form-group">
                <label for="costoPieza">Nueva Deuda</label>
                <input type="text" class="form-control" name="deuda" value="{{ $cliente->deuda}}">
            </div>
            <button type="submit" class="btn btn-block btn-warning">Edita</button>
        </form>
    </div>
</div>
@endsection