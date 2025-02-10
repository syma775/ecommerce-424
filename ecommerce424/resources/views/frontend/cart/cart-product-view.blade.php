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
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                <h3 style="text-align:center;margin-top:20px;font-size:bold">Single Product view</h3>
            <table class="table table-bordered">
                <tr>
                        <th>SL</th>
                        <td>{{ $basket->id}}</td>
                </tr>
                <!-- <tr>
                    <th>User ID</th>
                    <td>{{ $basket->user_id }} </td>
                </tr>
                <tr>
                    <th>Vendor Id</th>
                    <td>{{ $basket->vendor_id }} </td>
                </tr> -->
                <tr>
                    <th>Product Name</th>
                    <td>{{ $basket->product->name }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{$basket->price}}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $basket->qty }}</td>
                </tr>
                <tr>
                    <th>Total Price</th>
                    <td>{{ $basket->total_price }}</td>
                </tr>
                
                <tr>
                    <th>created_at</th>
                    <td>{{ $basket->created_at }}</td>
                </tr>
                <tr>
                    <th>updated_at</th>
                    <td>{{ $basket->updated_at }}</td>
                </tr>
           
            </table>
                </div>
            </div>
            <div class="col-md-3"></div>

          
        </div>
    </div>
</div>

</body>
</html>