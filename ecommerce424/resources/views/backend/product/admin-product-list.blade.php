@extends('backend.master')

@section('content')

<div class="container-fluid">
    <div class="col-md-12">
    @if(session()->has('success'))
           <div class="alert alert-success" style="margin-top:20px;">{{ session()->get('success')}}</div>
         @endif
        <div class="row">
     
            <h3 style="text-align:center;margin-top:20px;font-size:bold">Product List</h3>
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Color</th>
                    <th>Size</th>
                    
                    <!-- <th>Category ID</th> -->
                    <th>Category Name</th>
                    <th>price</th>
                    <th>Status</th>
                    <th>Vendor Id</th>
                    <th>Image</th>
                    <th>Manage</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $loop->index+1}}</td>
                        <td>{{ $product->name}}</td>
                        <td>{{ $product->color}}</td>
                        <td>{{ $product->size}}</td>
                        
                        <!-- <td>{{ $product->category_id}}</td> -->
                        <td>{{ $product->category->name}}</td>
                        <td>{{ $product->price}}</td>
                        <td>
                        @if($product->status==0)
                         <button class="btn btn-danger">Pending</button>
                       @else
                       <button class="btn btn-success">Approved</button>
                       @endif
                        </td>
                        <td>{{ $product->vendor_id}}</td>
                      
                        <td>
                        <img src="{{ asset('/product/'.$product->image) }}" width="100px" height="100px"/>
                    </td>
                        <td>
                            <a href="{{ url('/vendor/products/view/'.$product->id) }}" class="btn btn-warning">View</a>
                            <a href="{{ url('/admin/product/approve/'.$product->id) }}" class="btn btn-sm btn-info">Approve</a>
                            <a href="{{ url('/admin/product/delete/'.$product->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')">Delete</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
</div>

@endsection