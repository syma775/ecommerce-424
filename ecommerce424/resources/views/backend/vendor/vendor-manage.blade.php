@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">

            <h3 style="text-align:center;margin-top:20px;font-size:bold">Category List</h3>
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
                @foreach($vendors as $vendor)
                    <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ $vendor->fname}}</td>
                        <td>{{ $vendor->email}}</td>
                        <td>{{ $vendor->phone}}</td>
                        <td>{{ $vendor->status}}</td>
                        <td>
                            <a href="{{ url('/vendor/view/'.$vendor->id) }}" class="btn btn-warning">View</a>
                            <a href="{{ url('/vendor/approve/'.$vendor->id) }}" class="btn btn-sm btn-info">Approve</a>
                            <!-- <a href="{{ url('/vendor/pending/'.$vendor->id) }}" class="btn btn-sm btn-primary">Pending</a> -->
                            <a href="{{ url('/vendor/delete/'.$vendor->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>

@endsection