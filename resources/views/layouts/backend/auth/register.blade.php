<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/dev/AdminLTE/pages/examples/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 27 Sep 2020 10:25:30 GMT -->
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
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    @if(Session::get('lang') == 'bangla')
    <b>অ্যাডমিন </b>রেজিস্টার
    @else
    <b>Admin </b>Register
    @endif

  </div>

  <div class="card">
    <div class="card-body register-card-body">
        @if(Session::get('lang') == 'bangla')
        <p class="login-box-msg">একটি নতুন অ্যাকাউন্ট নিবন্ধন করুন</p>
        @else
        <p class="login-box-msg">Register a new account</p>
        @endif
        @if(Session::get('lang') == 'bangla')
        <form id="register">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="পুরো নাম" name="name">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="ইমেল" name="email">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="ফোন নম্বর" name="phn">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-phn"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="ঠিকানা" name="address">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-location"></span>
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
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                    আমি শর্তাবলীর সাথে সম্মত হন
                </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">নিবন্ধন</button>
            </div>
            <!-- /.col -->
            </div>
        </form>
        <a href="{{route('login')}}" class="text-center">আমার ইতিমধ্যে একটি অ্যাকাউন্ট আছে</a>
        @else
        <form id="register">
            @csrf
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Full name" name="name">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="number" class="form-control" placeholder="Phone number" name="phn">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-phn"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="address" name="address">
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-location"></span>
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
            <div class="input-group mb-3">
                <input type="password" class="form-control" placeholder="Retype password" name="password">
                <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                <label for="agreeTerms">
                    I agree to the terms
                </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>
            <!-- /.col -->
            </div>
        </form>
        <a href="{{route('login')}}" class="text-center">I already have an account</a>
        @endif
    </div>
  </div>
</div>

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

    $("#register").submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ route('store') }}",
            method: "POST",
            data: new FormData(document.getElementById("register")),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                window.location.href ='/admin/login';
                Toast.fire({
                    icon: 'success',
                    title: 'Registration successfull.'
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
