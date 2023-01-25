<table class="table table-bordered">
    <tr>
        <th>Produto</th>
        <th>Quantidade</th>
        <th>Valor</th>
    </tr>
    @foreach($order->order_items  as $item)
    <tr>
        <td>{{ $item->product->name }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->price }}</td>
    </tr>
    @endforeach
</table>