<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <title>Cart List</title>
</head>
<body>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">

            <h3 style="text-align:center;margin-top:20px;font-size:bold">Item List</h3>
            <table class="table table-bordered">
                <tr>
                    <th>SL</th>
                    <!-- <th>User Id</th>
                    <th>Vendor Id</th> -->
                    <th>Product name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Manage</th>
                    <th>Add More Product</th>
                </tr>
                @php
                    $sum = 0;
                    $qty = 0;
                @endphp
                @foreach($baskets as $basket)
                    <tr>
                        <td>{{ $loop->index+1}}</td>
                        <!-- <td>{{ $basket->user_id}}</td>
                        <td>{{ $basket->vendor_id}}</td> -->
                        <td>{{ $basket->product->name}}</td>
                        <td>{{ $basket->price}}</td>
                        <td>{{ $basket->qty}}</td>
                        <td>{{ $basket->total_price}}</td>
                        <td>
                            <a href="{{ url('/cart/view/'.$basket->id) }}" class="btn btn-warning">View</a>
                            
                            
                            <a href="{{ url('/cart/delete/'.$basket->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('are you sure?')">Delete</a>
                            
                        </td>
                        <td>
                         <form action="{{ url('/cart/product/update/'.$basket->id) }}" method="post">
                                @csrf
                                <input type="number" name="qty" class="btn btn-sm btn-info" value="{{ $total_qty = $basket->qty }}"/><button type="submit" class="btn btn-sm btn-success" name="btn">Update</button>
                            </form>
                        </td>
                        
                    </tr>
                    <tr>
                    <th colspan="3">Total Price</th>
                      <td colspan="6">{{ $total_price = $basket->price *$basket->qty }}</td>
                     
                    </tr>
                    
                    @php
                        $sum+= $total_price;
                        $qty+= $total_qty;
                    @endphp
                   
                @endforeach
                

                <tr>
                    <td colspan="3">subtotal</td>
                    <td colspan="6">{{ $sum }}</td>
                    
                    <td>
                        
                      <a href="{{ url('/cart/check/'.$basket->id) }}" class="btn btn-warning">Check</a>
                           
                      </td>
                    
                </tr>

            </table>

            
        </div>
    </div>
</div>
</body>
</html>

