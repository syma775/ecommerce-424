@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            @if(session()->has('success'))
              <div class="btn btn-block btn-success">{{ session()->get('success') }}</div>
            @endif

            <h3 style="text-align:center;margin-top:20px;font-size:bold">Category List</h3>
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Manage</th>
                </tr>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <img src="{{ asset('/uploads/'. $category->image) }}" height="100" weight="100" />
                        </td>
                        <td>
                            <a href="{{ url('/category/view/'.$category->id) }}" class="btn btn-warning">View</a>
                            <a href="{{ url('/category/edit/'.$category->id) }}" class="btn btn-sm btn-info">Edit</a>
                            <a href="{{ url('/category/delete/'.$category->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection