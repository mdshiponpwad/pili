<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/dev/AdminLTE/pages/examples/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Sep 2020 10:25:30 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PiliHoney</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="../../../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <link rel="stylesheet" href="{{asset('backend/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/dist/css/adminlte.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    @if(Session::get('lang') == 'bangla')
        <a href="#"><b>অ্যাডমিন </b>লগ-ইন</a>
    @else
        <a href="#"><b>Admin</b>Login</a>
    @endif
  </div>
  <div class="card">
    @if(Session::get('lang') == 'bangla')
    <div class="card-body login-card-body">
      <p class="login-box-msg">আপনার সেশন শুরু করতে সাইন ইন করুন</p>
      <form id="login">
          @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="ইমেল" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="পাসওয়ার্ড" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                আমাকে মনে কর
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button class="btn btn-primary btn-block">সাইন ইন করুন</button>
          </div>
        </div>
      </form>

      <p class="mb-1">
        <a href="#">আমি আমার পাসওয়ার্ড ভুলে গেছি</a>
      </p>
      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">একটি নতুন অ্যাকাউন্ট নিবন্ধন করুন</a>
      </p>
    </div>
    @else
    <div class="card-body login-card-body">
        <p class="login-box-msg">Strat your session</p>
        <form id="login">
            @csrf
          <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email">
              <div class="input-group-append">
                  <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                  </div>
              </div>
          </div>
          <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password">
              <div class="input-group-append">
                  <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

        <p class="mb-1">
          <a href="#">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center">Register a new account</a>
        </p>
      </div>
    @endif
  </div>
</div>
<!-- /.login-box -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('backend/dist/js/adminlte.js')}}"></script>
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('sweetalert2.js')}}"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })
    $("#login").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('user.login') }}",
            method: "POST",
            data: new FormData(document.getElementById("login")),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                window.location.href ='/admin/dashboard';
                Toast.fire({
                    icon: 'success',
                    title: 'Signed in successfully'
                })

            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        })
    })

</script>
</body>

</html>
