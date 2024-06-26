<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blood Donation System</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/donor/home" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Blood Donation System</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        <a href="/donor/delete/account" class="btn btn-outline-danger mx-3" title="This will delete all your data" onclick="return confirm('This will delete your account and all your data from the system')">
            Delete Account
          </a>
        @if ($is_public == 1)
        <a href="/donor/public/private" class="btn btn-outline-danger mx-3" title="This will make you private">
          Private
        </a>
        @endif
        @if ($is_public == 0)
        <a href="/donor/public/private" class="btn btn-outline-success mx-3" title="This will make you public">
          Public
        </a>
        @endif


        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            @if (empty(auth()->user()->image))
              <img src="{{asset('images/blood-donor.jpg')}}" alt="Profile" class="rounded-circle">
            @else
              <img src="{{ Storage::url(auth()->user()->image) }}" alt="Profile" class="rounded-circle">
            @endif
            <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->name}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{auth()->user()->name}}</h6>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/donor/profile">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/donor/home">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/donor/all/donations">
          <i class="bi bi-droplet-fill text-danger"></i>
          <span>All Donations</span>
        </a>
      </li><!-- End Profile Page Nav -->

        <li class="nav-item">
        <a class="nav-link collapsed" href="/donor/profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    @yield('main-section')
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
