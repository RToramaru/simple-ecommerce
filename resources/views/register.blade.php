@extends('layout')
@section('content')
<div class="col-12">

    <div class="col-12 mb-3">
        <h2>Cadastrar Clientes</h2>
    </div>

    <form action="{{ route('register_client') }}" method="post" class="row">
        @csrf
        <div class="col-6">
            <div class="form-group">
                Nome: <input type="text" name="name" class="form-control">
            </div>
        </div>

        <div class="col-6">

            <div class="form-group">
                Email: <input type="email" name="email" class="form-control">
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                Senha: <input type="password" name="password" class="form-control">
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                Endereço: <input type="text" name="street" class="form-control">
            </div>
        </div>

        <div class="col-2">
            <div class="form-group">
                Número: <input type="text" name="number" class="form-control">
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                Complemento: <input type="text" name="complement" class="form-control">
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                Cidade: <input type="text" name="city" class="form-control">
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                Estado: <input type="text" name="state" class="form-control">
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                CEP: <input type="text" name="cep" class="form-control" id="cep">
            </div>
        </div>
        <div class="form-group mt-3">
            <input type="submit" value="Cadastrar" class="btn btn-primary">
        </div>
    </form>
</div>

@endsection