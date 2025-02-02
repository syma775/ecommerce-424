@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">

            <h3 style="text-align:center;margin-top:20px;font-size:bold">User List</h3>
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Manage</th>
                </tr>
                @foreach($buyers as $buyer)
                    <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ $buyer->name}}</td>
                        <td>{{ $buyer->email}}</td>
                        <td>{{ $buyer->phone}}</td>
                        <td>{{ $buyer->address}}</td>
                        <td>
                            <a href="{{ url('admin/buyer/view/'.$buyer->id) }}" class="btn btn-warning">View</a>
                            <a href="{{ url('/admin/buyer/delete/'.$buyer->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>

@endsection