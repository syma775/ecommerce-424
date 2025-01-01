<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Login</title>
  <link rel="stylesheet" href="{{ asset('backend/admin-login/') }}/style.css"/>
</head>
<body>
<div class="login-page">

  <div class="form">
  @if(session()->has('error'))
        <p style="color:red;">{{ session()->get('error') }}</P>
        @endif
    <!-- <form class="register-form">
      <input type="text" placeholder="name"/>
      <input type="password" placeholder="password"/>
      <input type="text" placeholder="email address"/>
      <button>create</button>
      <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form> -->
    <form class="login-form" action="{{ url('/admin/login/form') }}" method="POST">
      @csrf
      <input type="text" name="email" placeholder="email"/>
      <input type="password" name="password" placeholder="password"/>
      <button type="submit">login</button>
      <!-- <p class="message">Not registered? <a href="#">Create an account</a></p> -->
    </form>
  </div>
</div>
<script src="{{ asset('backend/admin-login/') }}/script.js"></script>
</body>
</html>