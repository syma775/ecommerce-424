@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <h3 style="text-align:center;margin-top:20px;font-size:bold">User Single View</h3>
            <table class="table table-bordered">
                <tr>
                        <th>SL</th>
                        <td>{{ $buyer->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $buyer->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $buyer->email }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $buyer->address }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $buyer->phone }}</td>
                </tr>
                <tr>
                    <th>created_at</th>
                    <td>{{ $buyer->created_at }}</td>
                </tr>
                <tr>
                    <th>updated_at</th>
                    <td>{{ $buyer->updated_at }}</td>
                </tr>
           
            </table>
        </div>
    </div>
</div>

@endsection