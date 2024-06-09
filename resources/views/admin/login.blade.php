<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blood Donation System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  {{-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="stylesheet" href="{{ asset('niceAdmin/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('niceAdmin/vendor/bootstrap/css/bootstrap.min.css')}}" >
  <link rel="stylesheet" href="{{asset('niceAdmin/vendor/bootstrap-icons/bootstrap-icons.css')}}">
  <link rel="stylesheet" href="{{asset('niceAdmin/vendor/boxicons/css/boxicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('niceAdmin/vendor/quill/quill.snow.css')}}">
  <link rel="stylesheet" href="{{asset('niceAdmin/vendor/quill/quill.bubble.css')}}">
  <link rel="stylesheet" href="{{asset('niceAdmin/vendor/remixicon/remixicon.css')}}">
  <link rel="stylesheet" href="{{asset('niceAdmin/vendor/simple-datatables/style.css')}}">

  <!-- Template Main CSS File -->
  <link rel="stylesheet" href="{{asset('niceAdmin/css/style.css')}}">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body style="background-image: url({{asset('admin/img/banner.png')}}); background-repeat: no-repeat; background-size:cover;">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/landing" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block text-white">Blood Donation System</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>
                     @if (Session::has('success'))
                      <div class="alert alert-success p-2">{{Session::get('success')}}</div>
                      @endif
                      @if (Session::has('fail'))
                          <div class="alert alert-danger p-2">{{Session::get('fail')}}</div>
                      @endif
                  <form class="row g-3" action="{{ route('LoginUser')}}">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <input type="email" name="email" placeholder="Username" class="form-control" value="{{ old('email')}}">
                      @error('email')
                          <span>{{$message}}</span>
                      @enderror
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" >
                      @error('password')
                          <span>{{$message}}</span>
                      @enderror
                    </div>
                    <div class="col-12">
                        {{-- <a   class="btn btn-primary w-100" href="/admin/dashboard">Login</a> --}}
                      <button class="btn btn-primary w-100" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('niceAdmin/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('niceAdmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('niceAdmin/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('niceAdmin/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('niceAdmin/vendor/quill/quill.js')}}"></script>
  <script src="{{asset('niceAdmin/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('niceAdmin/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('niceAdmin/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('niceAdmin/js/main.js')}}"></script>

</body>

</html>