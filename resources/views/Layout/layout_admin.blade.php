<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  
  <title> @yield('title') </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('/') }}niceadmin/assets/img/logo ikhlas beramal.png" rel="icon">
  <link href="{{ asset('/') }}niceadmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('/') }}niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('/') }}niceadmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('/') }}niceadmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ asset('/') }}niceadmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ asset('/') }}niceadmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('/') }}niceadmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('/') }}niceadmin/assets/css/style.css" rel="stylesheet">

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
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ asset('/') }}niceadmin/assets/img/logo ikhlas beramal.png" alt="">
        {{-- <span class="d-none d-lg-block">SI-ASRAMA DARUSSALIM</span> --}}
        <span style="font-size: 18px;">SI-Asrama Darussalim</span>
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

        

     

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('/') }}niceadmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            {{-- <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->level }}</span> --}}
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Username</h6>
              <span>Level</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

           

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
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
        <a class="nav-link " href="{{ url('/dashboard') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      @if (Auth::check() &&
   (Auth::user()->level == 'Admin' || Auth::user()->level == 'Kepala Yayasan'))
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/data-santri') }}">
          <i class="bi bi-journal-text"></i><span>Data Santri/i</span>
        </a>
      </li><!-- End Forms Nav -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/data-ruangan') }}">
          <i class="bi bi-layout-text-window-reverse"></i><span>Data Ruangan</span>
        </a>
      </li><!-- End Tables Nav -->

      
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/data-pegawai') }}">
          <i class="bi bi-person-badge"></i><span>Data Pegawai</span>
        </a>
      </li><!-- End Tables Nav -->
     @endif
      @if(auth()->check() && auth()->user()->level === 'Admin')
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('/data-pengguna') }}">
          <i class="bi bi-person"></i><span>Data Pengguna</span>
        </a>
      </li><!-- End Tables Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" href="data-profile">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->
      @endif

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-receipt"></i><span>Tagihan</span>
          <i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              @if(auth()->check() && auth()->user()->level === 'Admin') 
              {{-- admin dan kepala --}}
          <li>
            <a href="/data-tagihan">
              <i class="bi bi-circle"></i><span>Tagihan Asrama</span>
            </a>
          </li>
          <li>
          @endif
      {{-- endif --}}
              @if(auth()->check() && auth()->user()->level === 'Santri') 
            
          <li>
            <a href="/tagihan_santri">
              <i class="bi bi-circle"></i><span>Tagihan Santri</span>
            </a>
          </li>
          <li>
     @endif
     <li>
            <a href="/data-riwayat">
              <i class="bi bi-circle"></i><span>Riwayat Pembayaran</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

     

      <li class="nav-item">
        <a class="nav-link collapsed" href="/logout">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Logout</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->
  

  <main id="main" class="main">
    <div class="pagetitle">
      <h1> @yield('title') </h1>
      <nav>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="data-ruangan">Dashboard</a></li>
              <li class="breadcrumb-item active">@yield('title') </li>
          </ol>
      </nav>
  </div>
    @yield('content')
    

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Risdaaaa</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('/') }}niceadmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ asset('/') }}niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('/') }}niceadmin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ asset('/') }}niceadmin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{ asset('/') }}niceadmin/assets/vendor/quill/quill.js"></script>
  <script src="{{ asset('/') }}niceadmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ asset('/') }}niceadmin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ asset('/') }}niceadmin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('/') }}niceadmin/assets/js/main.js"></script>

</body>

</html>