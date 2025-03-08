<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
  
    <title>Register</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
  
    <!-- Favicons -->
    <link href="{{asset('/') }}niceadmin/assets/img/logo ikhlas beramal.png" rel="icon">
    <link href="{{asset('/') }}niceadmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <!-- Vendor CSS Files -->
    <link href="{{asset('/') }}niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('/') }}niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="{{asset('/') }}niceadmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="{{asset('/') }}niceadmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="{{asset('/') }}niceadmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="{{asset('/') }}niceadmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="{{asset('/') }}niceadmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
    <!-- Template Main CSS File -->
    <link href="{{asset('/') }}niceadmin/assets/css/style.css" rel="stylesheet">
  
    <!-- =======================================================
    * Template Name: NiceAdmin
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Updated: Apr 20 2024 with Bootstrap v5.3.3
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
  </head>
  <body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="{{asset('/') }}niceadmin/assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">NiceAdmin</span>
                </a>
              </div><!-- End Logo -->

              <form class="row g-3 needs-validation" action="{{ url('register') }}" method="POST" novalidate>
                @csrf
                <div class="col-12">
                    <label for="nisn" class="form-label">NISN</label>
                    <input type="number" name="nisn" class="form-control" id="nisn" required>
                    <div class="invalid-feedback">Please, enter your NISN!</div>
                </div>
                <div class="col-12">
                    <label for="nm_santri" class="form-label">Nama Santri</label>
                    <input type="text" name="nm_santri" class="form-control" id="nm_santri" required>
                    <div class="invalid-feedback">Please, enter your name!</div>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                    <div class="invalid-feedback">Please enter a valid email!</div>
                </div>
                <div class="col-12">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" id="tanggal_lahir" required>
                    <div class="invalid-feedback">Please enter a valid date!</div>
                </div>
                <div class="col-12">
                    <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
                    <div class="invalid-feedback">Please enter your birthplace!</div>
                </div>
                <div class="col-12">
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <div class="invalid-feedback">Please select gender!</div>
                </div>
                <div class="col-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                    <div class="invalid-feedback">Please enter your address!</div>
                </div>
                <div class="col-12">
                    <label for="nama_ayah" class="form-label">Nama Ayah</label>
                    <input type="text" name="nama_ayah" class="form-control" id="nama_ayah" required>
                    <div class="invalid-feedback">Please enter father's name!</div>
                </div>
                <div class="col-12">
                    <label for="nama_ibu" class="form-label">Nama Ibu</label>
                    <input type="text" name="nama_ibu" class="form-control" id="nama_ibu" required>
                    <div class="invalid-feedback">Please enter mother's name!</div>
                </div>
                <div class="col-12">
                    <div class="form-check">
                        <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                        <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                        <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                </div>
                <div class="col-12">
                    <button class="btn btn-primary w-100" type="submit">Create Account</button>
                </div>
                <div class="col-12">
                    <p class="small mb-0">Already have an account? <a href="{{ url('login') }}">Log in</a></p>
                </div>
            </form>
            


              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('/') }}niceadmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{asset('/') }}niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{asset('/') }}niceadmin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{asset('/') }}niceadmin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{asset('/') }}niceadmin/assets/vendor/quill/quill.js"></script>
  <script src="{{asset('/') }}niceadmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{asset('/') }}niceadmin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{asset('/') }}niceadmin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('/') }}niceadmin/assets/js/main.js"></script>



<svg id="SvgjsSvg1001" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;"><defs id="SvgjsDefs1002"></defs><polyline id="SvgjsPolyline1003" points="0,0"></polyline><path id="SvgjsPath1004" d="M0 0 "></path></svg></body>