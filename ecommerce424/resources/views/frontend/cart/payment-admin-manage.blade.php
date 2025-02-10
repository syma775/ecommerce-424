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
                    <th>User Name</th>
                    <th>Payment system</th>
                    <th>Manage</th>
                </tr>
                @foreach($payment as $payment)
                    <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ $payment->user_id}}</td>
                        <td>{{ $payment->user_name}}</td>
                        <td>{{ $payment->pay}}</td>
                        <td>
                            <a href="{{ url('/pay/complete/'.$payment->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')">Complete</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>

@endsection