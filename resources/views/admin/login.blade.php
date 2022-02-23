
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{url('public/admin')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{url('public/admin')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('public/admin')}}/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Đăng nhập</b></a>
    </div>
          @if(Session::has('no'))
            <div class="alert alert-danger" role="alert">
            {{Session::get('no')}}
            </div>
          @endif
    <div class="card-body"> 
      <p class="login-box-msg">Đăng nhập để bắt đầu phiên của bạn</p>
      
      <form action="" method="post">
        @csrf 
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="icheck-primary">
              <input type="checkbox" id="remember" name="remember" value="1">
              <label for="remember">
                Hiển thị mật khẩu!
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-danger btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Đăng nhập vào Facebook
        </a>
        <a href="#" class="btn btn-block btn-success">
          <i class="fab fa-google-plus mr-2"></i> Đăng nhập vào Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">Quên mật khẩu ?</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Đăng ký thành viên mới !</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->


</body>
</html>