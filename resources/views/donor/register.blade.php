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
            <div class="col-lg-9 col-md-9 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="/landing" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block text-white">Blood Donation System</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Register Your Account</h5>
                    <p class="text-center small">Fill the form below</p>
                  </div>
                  <form class=" g-3" action="{{ route('registerDonor')}}">
                    <div class="row">
                        <div class="col-6">
                            <label for="yourUsername" class="form-label">Full Name</label>
                            <input type="text" placeholder="Your Full name" class="form-control" name="full_name">
                            @error('full_name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6">
                            <label for="yourUsername" class="form-label">Mobile Number</label>
                            <input type="number" placeholder="Mobile Number" class="form-control" name="phone">
                            @error('phone')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6 my-2">
                            <label for="yourUsername" class="form-label">Email</label>
                            <input type="email" placeholder="Email" class="form-control" name="email">
                              @error('email')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                       
                        <div class="col-6 my-2">
                            <label for="yourUsername" class="form-label">Age</label>
                            <input type="text" placeholder="Your Age" class="form-control" name="age">
                             @error('age')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                         <div class="col-6 my-2">
                            <label for="yourUsername" class="form-label">Gender</label>
                            <select name="gender" id="" class="form-select">
                                <option value="">Choose gender</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                               @error('gender')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6 my-2">
                            <label for="yourUsername" class="form-label">Blood Group</label>
                            <select name="blood_group" id="" class="form-select">
                                <option value="">Choose blood Group</option>
                                <option value="A-">A-</option>
                                <option value="A+">A+</option>
                                <option value="B-">B-</option>
                                <option value="B+">B+</option>
                                <option value="AB-">AB-</option>
                                <option value="AB+">AB+</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                             @error('blood_group')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-13 my-2">
                            <label for="yourUsername" class="form-label">Address</label>
                            <input type="text" placeholder="Your Address" class="form-control" name="address">
                            @error('address')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="col-6 my-2">
                            <label for="yourPassword" class="form-label">Password</label>
                            <input type="password" name="password" placeholder="Enter Your Password" class="form-control" id="yourPassword">
                           @error('password')
                                <span class="text-danger">{{$message}}</span>
                            @enderror 
                        </div>
                        <div class="col-6 my-2">
                            <label for="yourPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" placeholder="Confirm Your Password" class="form-control" id="yourPassword">
                             @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>  
                     @if (Session::has('success'))
                      <div class="alert alert-success">{{Session::get('success')}}</div>
                      @endif
                      @if (Session::has('error'))
                          <div class="alert alert-danger">{{Session::get('error')}}</div>
                      @endif
                   <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Register</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0 my-3">have an account? <a href="/donor/login">Login</a></p>
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