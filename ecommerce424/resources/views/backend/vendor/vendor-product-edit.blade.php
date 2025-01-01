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
      <div class="card">
         <h3  style="text-align:center; color:gray;margin-top:30px;">Product Add</h3>
         
        <div class="container" style="background-color:white; margin-top:30px;">
         @if(session()->has('success'))
           <div class="alert alert-success" style="margin-top:20px;">{{ session()->get('success')}}</div>
         @endif
           <form action="{{ url('/vendor/product/update/'.$product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" placeholder="please enter Product name"/>
              </div>
              <div class="form-group">
                <label>Product Type</label>
                <select class="form-control" name="type">
                    <option selected disabled>Select A Product Type</option>
                    <option value="new">New Arrivals</option>
                    <option value="hot">Hot Products</option>
                    <option value="discount">Discounted Products</option>
                </select>
              </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control"  name="category_id">
                    <option selected disabled>Select A Category</option>
                    @foreach($categories as $category)
                    <option  value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- <div class="form-group">
                <label>Vendor</label>
                <input type="text" name="color" class="form-control" placeholder="please enter Product name"/>
              </div> -->

              <div class="form-group">
                <label>Color</label>
                <input type="text" name="color"  value="{{ $product->color }}" class="form-control" placeholder="please enter Product name"/>
              </div>

              <div class="form-group">
                <label>Size</label>
                <input type="text" name="size"  value="{{ $product->size }}" class="form-control" placeholder="please enter Product name"/>
                    
              </div>

              <div class="form-group">
                <label>Brand</label>
                <input type="text" name="brand"  value="{{ $product->brand }}" class="form-control" placeholder="please enter Product name"/>
              </div>

              <div class="form-group">
                <label>Price</label>
                <input type="text" name="price"  value="{{ $product->price }}" class="form-control" placeholder="please enter Product price "/>
              </div>

              <div class="form-group">
              <label>Quantity</label>
              <input type="text" name="qty"  value="{{ $product->qty }}" class="form-control" placeholder="please enter Product name"/>
              </div>

              <div class="form-group">
                <label>Short Description</label>
                <input type="text" name="short_description"  value="{{ $product->short_description }}" class="form-control" placeholder="please enter Product name"/>
              </div>

              <div class="form-group">
                <label>Long Description</label>
                <input type="text" name="long_description"  value="{{ $product->long_description }}"placeholder="enter your product details" class="form-control"/>
              </div>


              <div class="form-group">
                  <label>Image</label>
                  <input type="file"  name="image" class="form-control"/>
                  <img src="{{ asset('/product/'.$product->image) }}"  width="80px" height="80px"/>
              </div>

              <!-- <div class="form-group">
                <label>Gallery Image</label>
                <input type="file" name="multi_image[]" multiple class="form-control"/>
              </div> -->

             <button type="submit" class="btn btn-block btn-success" style="margin-bottom:30px;margin-top:40px;">Update</button>

           </form>
           <button class="btn btn-sm btn-success"  style="float:right;margin-top:20px;margin-bottom:20px;"><a style=" color:white;text-decoration:none"href="{{ url('/vendor/product/list') }}">Product list</a></button>

        </div>
      </div>
    
    </div>
</body>
</html>