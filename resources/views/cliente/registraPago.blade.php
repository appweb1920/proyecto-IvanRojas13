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
        <form method="post" action="{{ route('clientes.restaDeuda', $cliente->id) }}">
            <div class="form-group">
                @csrf
                @method('post')
            <div class="form-group">
                <label for="pago">Pago</label>
                <input type="text" class="form-control" name="pago" name="{{ $cliente->pago}}"/>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Listo</button>
        </form>
    </div>
</div>
@endsection