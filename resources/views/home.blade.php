@extends('layout')
@section('content')
    @include('_products', ['products' => $products])
@endsection