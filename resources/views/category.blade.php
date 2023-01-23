@extends('layout')
@section('content')
    <div class="col-2">
        <div class="list-group">
            @if(isset($categories) && count($categories) > 0)
                <a href="{{ route('category') }}" class="list-group-item list-group-item-action @if(0== $id) active @endif"> Todas </a>
                @foreach($categories as $category)
                <a href="{{ route('category_id', ['id' => $category->id]) }}" 
                class="list-group-item list-group-item-action @if($category->id == $id) active @endif"> {{ $category->name }} </a>
                @endforeach
            @endif
        </div>
    </div>

    <div class="col-10">
        @include('_products', ['products' => $products])
    </div>
@endsection