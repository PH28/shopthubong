<h1>Xin chào {{ $order->user->fullname }}</h1>
@if($status == 0)
<h1>Danh sách đơn hàng bạn đã đặt :</h1>
<table >
                        <thead>
                            <tr >
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Amount</th>
 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderdetails as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</p>
                                <td>{{ number_format($item->unit_price)  }} VND</td>
                                <td>{{ number_format($item->quantity * $item->unit_price)  }} VND</td>
                            </tr>
                            @endforeach
                        </tbody>
</table>
<p>Total: {{ number_format($order->total)  }} VND</p>
@else 
<h1>Đơn hàng của bạn đã được hủy !</h1>
@endif