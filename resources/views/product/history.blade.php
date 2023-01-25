@extends('layout.app')
@section('content')

    <div class="col-12">
        <h2>Minhas Compras</h2>
    </div>

    <div class="col-12">
        <table class="table">
            <tr>
                <th>Pedido</th>
                <th>Data da compra</th>
                <th>Ações</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>Pedido #{{ $order->id }} - {{ $order->status }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td> <a href="#" class="btn btn-primary btn-sm info" data-bs-toggle="modal" data-bs-target="#modal_detail" data-bs-value="{{ $order->id }}"> <i class="bi bi-eye-fill"></i> </a>
                </tr>
            @endforeach
        </table>
    </div>

    <div class="modal fade" id="modal_detail">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Pedido #{{ $order->id }}</h2>
                </div>

                <div class="modal-body"> 
                    
                </div>

                <div class="modal-footer">
                    <button class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>
                </div>

            </div>
            
        </div>
    </div>
    @section('scripts')
        <script>
            $(document).ready(function(){
                $('.info').click(function(){
                    var index = $(this).data('bs-value'); 
                    $.ajax({
                        url: "{{ route('history_id') }}",
                        type: "post",
                        data: {
                            _token: "{{ csrf_token() }}",
                            index: index
                        },
                        success: function(data){
                            $('#modal_detail .modal-title').html('Pedido #' + index);
                            $('#modal_detail .modal-body').html(data);
                        }
                    });

                });
            });
        </script>
    @endsection
@endsection