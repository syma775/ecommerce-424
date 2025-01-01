<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor-Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>
<body>
<div class="container-fluid" style="background-color:white;">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        
 <div class="card">

    <h3  style="text-align:center; color:gray;margin-top:30px;">Products List</h3>
    <a href="{{ url('/vendor/product/add') }}" class="btn  btn-success" style="float:right; margin-bottom:20px;">Add Product</a>
   
   <div class="container" style="background-color:white; margin-top:30px;">
   <table class="table table-bordered">
       <tr>
           <th>SL</th>
           <!-- <th>Image</th> -->
           <th>Name</th>
           <!-- <th>Category ID</th> -->
           <th>Category Name</th>
           <th>Price</th>
           <th>Qty</th>
           <th>Status</th>
           <th>Action</th>
       </tr>
      @foreach($products as $product)
           <tr>
                   <td>{{ $loop->index+1 }}</td>
                   <!-- <td>
                       <img src="{{ asset('/product/'.$product->image) }}" height="80px" width="80px"/>
                   </td> -->
                   <td>{{ $product->name }}</td>
                   <!-- <td>{{ $product->category_id }}</td> -->
                   <td>{{ $product->category->name }}</td>
                   <td>{{ $product->price }}</td>
                   <td>{{ $product->qty }}</td>
                   <td>
                       @if($product->status==0)
                         <button class="btn btn-danger">Pending</button>
                       @else
                       <button class="btn btn-success">Approved</button>
                       @endif
                   </td>
                   <td>
                       <a href="{{ url('/vendor/products/edit/'.$product->id) }}" class="btn btn-sm btn-success">Edit</a>
                       <a href="{{ url('/vendor/product/delete/'.$product->id) }}" class="btn btn-sm btn-danger">Delete</a>
                       <a href="{{ url('/vendor/products/view/'.$product->id) }}" class="btn btn-sm btn-info">View</a>
                    
                    </td>
               </tr>
      @endforeach
   
   </table>
   <a href="{{ url('/vendor/dashboard') }}" class="btn  btn-warning" style="float:left; margin-bottom:20px;">Dashboard</a>
   
   </div>
 </div>
        </div>
        <div class="col-md-2"></div>
    </div>


</div>
</body>
</html>