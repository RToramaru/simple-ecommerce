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
                <a href="{{ route('register') }}" class="nav-link">Cadastrar</a>
            </div>
        </div>
        <a href="{{ route('view_cart') }}" class="btn btn-sm"><i class="bi bi-cart-fill"></i></a>
    </nav>

    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>