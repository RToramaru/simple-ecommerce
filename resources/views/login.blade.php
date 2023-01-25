@extends('layout')
@section('content')
    <div class="col-12">
        <h2 class="mb-3">Acessar o sistema</h2>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                Email: <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                Senha: <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group mt-2">
                <input type="submit" value="Acessar" class="btn btn-primary btn-lg">
            </div>
        </form>
    </div>
@endsection