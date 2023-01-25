@extends('layout.app')
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
                @php $total = 0; @endphp
                @foreach($cart as $id => $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td><img src="{{$product->photograph}}" height="50px"/>  </td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                       <td> <a href=" {{ route('remove_cart', ['id' => $id]) }}" class="btn btn-danger btn-sm"> <i class="bi bi-trash-fill"></i> </a>
                        </td>
                    </tr>
                    @php $total += $product->price; @endphp
                @endforeach
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>R$ {{ $total }}</td>
                </tr>
            </tfoot>

        </table>
        <form method="post" action="{{ route('finalize_cart') }}">
            @csrf
            <input type="submit" value="Finalizar compra" class="btn btn-success col-12 me-2 mt-3 btn-lg">
        </form>
            
    @else
        <p>Nenhum produto no carrinho</p>
    @endif
@endsection