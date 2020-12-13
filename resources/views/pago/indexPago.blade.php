@extends('layout')
@section('content')
<style>
    .push-top {
    margin-top: 20px;
    }
    
</style>

<div>
<div class="card-header">
        Registra tu pago
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
        <form method="post" action="{{ route('pagos.store') }}">
            <div class="form-group">
                @csrf
                <select name="cliente_id">
                @foreach($lista_clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pago">Pago</label>
                <input type="numeric" class="form-control" name="pago"/>
            </div>
            <div class="form-group">
                <label for="deuda">Deuda</label>
                <input type="numeric" class="form-control" name="deuda"/>
            </div>
            <button type="submit" class="btn btn-block btn-danger">Listo</button>
        </form>
    </div>
</div>
@endsection