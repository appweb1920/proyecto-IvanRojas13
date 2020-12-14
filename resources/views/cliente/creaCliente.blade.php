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
        Crea Nuevo Cliente
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
        <form method="post" action="{{ route('clientes.store') }}">
            <div class="form-group">
                @csrf
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" name="nombre"/>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" name="apellido"/>
            </div>
            <div class="form-group">
                <label for="numTelefono">Numero de Telefono</label>
                <input type="text" class="form-control" name="numTelefono"/>
            </div>
            <div class="form-group">
                <label for="deuda">Deuda</label>
                <input type="text" class="form-control" name="deuda"/>
            </div>
            <button type="submit" class="btn btn-block btn-success">Guardar</button>
        </form>
    </div>
</div>
@endsection