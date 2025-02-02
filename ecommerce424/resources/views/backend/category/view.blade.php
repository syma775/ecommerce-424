@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            @if(session()->has('success'))
              <div class="btn btn-block btn-success">{{ session()->get('success') }}</div>
            @endif

            <h3 style="text-align:center;margin-top:20px;font-size:bold">Category Single View</h3>
            <table class="table table-bordered">
                <tr>
                        <th>SL</th>
                        <td>{{ $category->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $category->name }}</td>
                </tr>
                    <th>Image</th>
                    <td>
                        <img src="{{ asset('/uploads/'.$category->image) }}" width="100px" height="100px"/>
                    </td>
                </tr>
                <tr>
                    <th>slug</th>
                    <td>{{ $category->slug }}</td>
                </tr>
                <tr>
                    <th>created_at</th>
                    <td>{{ $category->created_at }}</td>
                </tr>
                <tr>
                    <th>updated_at</th>
                    <td>{{ $category->updated_at }}</td>
                </tr>
           
            </table>
        </div>
    </div>
</div>

@endsection