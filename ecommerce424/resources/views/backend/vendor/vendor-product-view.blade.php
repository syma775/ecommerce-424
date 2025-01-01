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
                        <td>{{ $product->id}}</td>
                </tr>
                <tr>
                    <th>Category ID</th>
                    <td>{{ $product->category_id }} </td>
                </tr>
                <tr>
                    <th>Category name</th>
                    <td>{{ $product->category->name }} </td>
                </tr>
                <tr>
                    <th>COlor</th>
                    <td>{{ $product->color }}</td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td>{{ $product->size }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $product->name }}</td>
                </tr>
                <tr>
                    <th>Type</th>
                    <td>{{ $product->type }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{ $product->price }}</td>
                </tr>
                <tr>
                    <th>Quantity</th>
                    <td>{{ $product->qty }}</td>
                </tr>
                <tr>
                    <th>Short Description</th>
                    <td>{{ $product->short_description }}</td>
                </tr>
                <tr>
                    <th>Long Description</th>
                    <td>{{ $product->long_description }}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td>
                        <img src="{{ asset('/product/'.$product->image) }}" width="100px" height="100px"/>
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{  $product->status }}</td>
                </tr>
                <tr>
                    <th>created_at</th>
                    <td>{{ $product->created_at }}</td>
                </tr>
                <tr>
                    <th>updated_at</th>
                    <td>{{ $product->updated_at }}</td>
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