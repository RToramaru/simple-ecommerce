@extends('layout.app')
@section('content')

    <div class="col-12 mt-5" align="center">
    <div class="col-4" >
        <h2 class="">Acessar o sistema</h2>

        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form-group">
                Email: <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                Senha: <input type="password" name="password" class="form-control">
            </div>
            
            <input type="submit" value="Acessar" class="btn btn-primary col-12 me-2 mt-3 btn-lg">
            
        </form>
    </div>
    </div>
    
    
@endsection