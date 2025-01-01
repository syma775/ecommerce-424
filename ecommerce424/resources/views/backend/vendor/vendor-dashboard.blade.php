<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendor - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


</head>
<body>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4" style="text-align:center;  margin-top:80px;">
            <div class="card" style="background-color:#82e0aa;">
            <h4 style="text-align:center;  margin-top:80px; color:white">Vendor Dashboard</h4>
            <button class="btn btn-success" style="float:right;margin-top:20px;margin-bottom:20px"><a style=" color:white;text-decoration:none" href="{{ url('/vendor/product/add') }}">Add Product</a></button>
            <button class="btn btn-primary" style="float:left;margin-top:20px;margin-bottom:20px"><a style=" color:white;text-decoration:none" href="{{ url('/vendor/product/list') }}">Product list</a></button>
            <button class="btn btn-danger" style="float:left;margin-top:20px;margin-bottom:20px"><a style=" color:white;text-decoration:none" href="{{ url('/vendor/logout') }}">Logout</a></button>
            
            
            </div>
          </div>
          <div class="col-md-4"></div>

        </div>

    </div>

   
  </div>
</body>
</html>