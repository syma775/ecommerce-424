<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<div class="container-fluid">
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-3"></div>
    
     <div class="col-md-6" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height:70vh; margin-top:100px; padding:30px;margin-bottom:30px;">
     @if(session()->has('success'))
					          <div class="alert alert-success">{{ session()->get('success')}}</div>
					          @endif
							  @if(session()->has('error'))
					          <div class="alert alert-danger">{{ session()->get('error')}}</div>
					          @endif
     <div class="card">
      <h3 style="margin-top:30px; margin-bottom:20px;text-align:center;">User Login</h3>
					<form action="{{ url('/buyer/customer/login') }}" method="POSt" style="margin-left:50px;margin-right:50px;">
						@csrf
						<label style="margin-bottom:5px">Email</label>
						<div class="form-group">
							<input type="email" class="form-control" name="email" placeholder="Enter your valid email"/>
						</div>

						<label style="margin-bottom:5px">Password</label>
						<div class="form-group">
							<input type="password" class="form-control" name="password" placeholder="Enter your password"/>
						</div>

						<button type="submit" style="margin-top:15px;margin-bottom:20px" class="btn btn-block btn-primary" name="btn">Login</button>
					</form>
          <a href="{{ url('/buyer/custmer/register') }}" style="text-align:center">Create an Account. Register</a>
      </div>
     </div>
      <div class="col-md-3"></div>
    </div>
  </div>
</div>
</form>
<script src="{{ asset('backend/vendor/') }}/style.css"></script>
</body>
</html>

