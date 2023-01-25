@if(isset($products))
    <div class="row">
        @foreach($products as $product)
            <div class="col-3 mb-3">
                <div class="card">
                    <img src="{{ $product->photograph }}" class="card-img-top">
                    <div class="card-body">
                        <h6 class="card-title">{{ $product->name }} - R$ {{ $product->price }}</h6>
                        <a href="{{ route('add_cart', ['id' => $product->id]) }}" class="btn btn-sm btn-secondary">Adicionar item</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
