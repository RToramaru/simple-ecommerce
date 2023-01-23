@extends('layout')
@section('content')
    <h3>Carrinho</h3>
    @if(isset($cart) && count($cart) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Imagem</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cart as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{$product->photograph}}" height="50px"/>  </td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td> <a href="#" class="btn btn-danger btn-sm"> <i class="bi bi-trash-fill"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum produto no carrinho</p>
    @endif
@endsection