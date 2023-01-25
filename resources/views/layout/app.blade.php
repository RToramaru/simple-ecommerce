<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RToramaru Shopping</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    
    <nav class="navbar navbar-light navbar-expand-md bg-light ps-5 pe-5 mb-5">
        <a href="#" class="navbar-brand">RToramaru Shopping</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <a href="{{ route('home') }}" class="nav-link">Home</a>
                <a href="{{ route('category') }}" class="nav-link">Categorias</a>
                @if(!\Auth::user())
                    <a href="{{ route('register') }}" class="nav-link">Cadastrar</a>
                @endif
                
                @if(!\Auth::user())
                    <a href="{{ route('login') }}" class="nav-link">Acessar</a>
                @else
                    <a href="{{ route('history') }}" class="nav-link">Minhas Compras</a>
                    <a href="{{ route('logout') }}" class="nav-link">Sair</a>
                @endif

                
            </div>
        </div>
        <a href="{{ route('view_cart') }}" class="btn btn-sm"><i class="bi bi-cart-fill"></i></a>
    </nav>

    <div class="container">
        <div class="row">
            @if(\Auth::user())
                <div class="col-12">
                        <p class="text-end">Olá, {{ \Auth::user()->name }}. Seja bem vindo. <a href="{{ route('logout') }}">Sair</a></p>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @yield('content')
        </div>
    </div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
@yield('scripts')
</body>
</html>