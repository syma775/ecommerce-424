@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">

            <h3 style="text-align:center;margin-top:20px;font-size:bold">Vendor List</h3>
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>User ID</th>
                    <th>Vendor ID</th>
                    <th>Product ID</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ $order->user_id}}</td>
                        <td>{{ $order->vendor_id}}</td>
                        <td>{{ $order->product_id}}</td>
                        <td>{{ $order->price}}</td>
                        <td>{{ $order->qty}}</td>
                        <td>{{ $order->total_price}}</td>
                        <td>
                            <a href="{{ url('/order/complete/'.$order->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')">Complete</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>

@endsection