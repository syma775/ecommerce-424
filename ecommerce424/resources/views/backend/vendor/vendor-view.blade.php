@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <h3 style="text-align:center;margin-top:20px;font-size:bold">Vendor Single View</h3>
            <table class="table table-bordered">
                <tr>
                        <th>SL</th>
                        <td>{{ $vendor->id}}</td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td>{{ $vendor->fname }}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{ $vendor->lname }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $vendor->email }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $vendor->address }}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $vendor->phone }}</td>
                </tr>
                    <th>Image</th>
                    <td>
                        <img src="{{ asset('vendor/'.$vendor->image) }}" width="100px" height="100px"/>
                    </td>
                </tr>
                <tr>
                    <th>status</th>
                    <td>{{ $vendor->status }}</td>
                </tr>
                <tr>
                    <th>created_at</th>
                    <td>{{ $vendor->created_at }}</td>
                </tr>
                <tr>
                    <th>updated_at</th>
                    <td>{{ $vendor->updated_at }}</td>
                </tr>
           
            </table>
        </div>
    </div>
</div>

@endsection