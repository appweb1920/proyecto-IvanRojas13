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
                <td>Apellido</td>
                <td>Numero de Telefono</td>
                <td>Deuda</td>
                <td class="text-center">Acción</td>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $clientess)
            <tr>
                <td>{{$clientess->id}}</td>
                <td>{{$clientess->nombre}}</td>
                <td>{{$clientess->apellido}}</td>
                <td>{{$clientess->numTelefono}}</td>
                <td>{{$clientess->deuda}}</td>
                <td class="text-center">
                    <a href="{{route('clientes.edit', $clientess->id)}}" class="btn btn-warning btn-sm"">Edita</a>
                    <a href="{{route('clientes.show', $clientess->id)}}" class="btn btn-success btn-sm"">Agrega Compra</a>
                    <a href="{{route('clientes.nuevoProd', $clientess->id)}}" class="btn btn-info btn-sm"">Info</a>
                    <a href="{{route('clientes.registraPago', $clientess->id)}}" class="btn btn-primary btn-sm"">Registra Pago</a>
                    <form action="{{route('clientes.destroy', $clientess->id)}}" method="post" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"" type="submit">Eliminar Cliente</button>
                    </form>
                </td>
            </>
            @endforeach
        </tbody>
    </table>
</div>
@endsection