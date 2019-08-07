@extends('layouts.app')

@section('content')
<body class="hold-transition login-page">
      <div class="login-box">
            <div class="login-box-body">
              <p class="login-box-msg">Sign in to start your session</p>

              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group has-feedback">
                  <input id="email" name="email" type="email" class="form-control" placeholder="Email">
                  <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input id="password" name="password" type="password" class="form-control" placeholder="Password">
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                  <div class="col-xs-8">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                    <!-- <div class="checkbox icheck"> -->
                      <!-- <label>
                        <input type="checkbox"> Remember Me
                      </label> -->
                    <!-- </div> -->
                  </div>
                  <!-- /.col -->
                  <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot?') }}
                        </a>
                    @endif
                    <!-- <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button> -->
                  </div>
                  <!-- /.col -->
                </div>
              </form>

              <!-- <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                  Facebook</a>
                <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                  Google+</a>
              </div> -->
              <!-- /.social-auth-links -->

              <a href="#">I forgot my password</a><br>
              <a href="register.html" class="text-center">Register a new membership</a>

            </div>
            <!-- /.login-box-body -->
            </div>
            <!-- /.login-box -->
<div class="login-box">
  <script src="adminpanel/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="adminpanel/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- iCheck -->
  <script src="adminpanel/plugins/iCheck/icheck.min.js"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' /* optional */
      });
    });
  </script>
</body>
@endsection
