@extends('layout.app')
@section('content')
    @include('product.fragments._products', ['products' => $products])
@endsection