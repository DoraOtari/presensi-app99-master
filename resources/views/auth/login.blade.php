<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Custom CSS untuk tampilan */
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
    }
    .login-container {
      margin-top: 50px;
    }
    .login-form {
      background-color: #fff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .login-img {
      max-width: 100%;
      height: auto;
    }
    .remember-me {
      margin-top: 10px;
    }
    .sign-in-btn {
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-6 col-lg-8 login-container">
        @if ($errors->any())
            <ul>
              @foreach ($errors->all() as $error)
                  <li class="text-danger">{{ $error }}</li>
              @endforeach
            </ul>
        @endif
        <div class="row">
          <div class="col-md-8 mx-auto">
            <form class="login-form" action="{{ route('login') }}" method="POST">
              @csrf
              <h3 class="card-title fw-bold">Sign In</h3>
              <small class="card-subtitle text-muted mb-2">masuk untuk menggunakan aplikasi</small>
              <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input required type="email" value="{{ old('email') }}" class="form-control" id="inputEmail" placeholder="Enter email" name="email">
              </div>
              <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input required type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
              </div>
              <div class="form-check remember-me hstack">
                <input class="form-check-input me-2" type="checkbox" id="rememberMe" name="remember">
                <label class="form-check-label" for="rememberMe">
                  Remember me
                </label>
                <a href="{{ route('password.request') }}" class="ms-auto">Lupa Password?</a>
              </div>
              <button type="submit" class="btn btn-primary d-block mx-auto sign-in-btn my-2">Sign In</button>
              <div class="text-center ">
                <p>Don't have an account? <a href="{{ route('register') }}">Sign Up</a></p>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
