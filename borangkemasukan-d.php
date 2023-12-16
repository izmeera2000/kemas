<?php include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KEMAS - Borang Kemasukan Bahagian D</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
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
            <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">


            <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="d-flex align-items-center w-auto">
                <img src="assets/img/kemaslogo.png" alt="">

                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">
                  <form method="post" action="?" enctype="multipart/form-data">

                    <div class="pt-4 pb-4 ">
                      <h5 class="card-title text-center pb-0 fs-4">Borang Kemasukan</h5>
                      <!-- <p class="text-center small">Enter your username & password to login</p> -->
                      <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                        <li class="nav-item flex-fill" role="presentation">
                          <button class="nav-link w-100 disabled" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#borangkemasukan-a" type="button" role="tab" aria-controls="home"
                            aria-selected="true">BAHAGIAN A</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                          <button class="nav-link w-100 disabled" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#borangkemasukan-b" type="button" role="tab" aria-controls="home"
                            aria-selected="true">BAHAGIAN B</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                          <button class="nav-link w-100 disabled" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#borangkemasukan-a" type="button" role="tab" aria-controls="home"
                            aria-selected="true">BAHAGIAN C</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                          <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#borangkemasukan-a" type="button" role="tab" aria-controls="home"
                            aria-selected="true">BAHAGIAN D</button>
                        </li>


                      </ul>
                    </div>

                    <h5 class="card-title">PERAKUAN IBU/BAPA/PENJAGA</h5>
                    <!-- <b class="">Sila muat turun fail .pdf tersebut dan memuat naik semula dalam bentuk .pdf -->
                    <!-- </b> -->


                    <div class="row mt-3">
                      <div class="col-1">
                        <div class="text-end" for="gridCheck1">
                          1.
                        </div>
                      </div>
                      <div class="col-9">
                        <label class="form-check-label" for="gridCheck1">
                          Saya memperakui bahawa saya memenuhi syarat syarat kelayakan penerima
                          bantuan Geran Perkapita
                        </label>
                      </div>
                      <div class="col-2">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="a">
                      </div>

                    </div>

                    <div class="row mt-3">
                      <div class="col-1">
                        <div class="text-end" for="gridCheck1">
                          2.
                        </div>
                      </div>
                      <div class="col-9">
                        <label class="form-check-label" for="gridCheck1">
                          Saya akan membantu melibatkan diri secara aktif dalam pelaksanaan program dan aktiviti TABIKA
                          KEMAS.
                        </label>
                      </div>
                      <div class="col-2">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="b" required>
                      </div>

                    </div>


                    <div class="row mt-3">
                      <div class="col-1">
                        <div class="text-end" for="gridCheck1">
                          3.
                        </div>
                      </div>
                      <div class="col-9">
                        <label class="form-check-label" for="gridCheck1">
                          Saya menjamin anak saya akan hadir ke TABIKA KEMAS pada hari-hari yang ditetapkan.
                          Sekiranya anak saya TIDAK HADIR adalah menjadi tanggungjawab saya untuk memaklumkan kepada
                          pihak TABIKA.
                          Ketidakhadiran akan disokong dengan dokumen sokongan.
                        </label>
                      </div>
                      <div class="col-2">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="c" required>
                      </div>

                    </div>

                    <div class="row mt-3">
                      <div class="col-1">
                        <div class="text-end" for="gridCheck1">
                          4.
                        </div>
                      </div>
                      <div class="col-9">
                        <label class="form-check-label" for="gridCheck1">
                          Saya membenarkan anak saya menerima rawatan perkhidmatan kesihatan/ disuntik/ tanam cacar
                          (jika belum) dan lain-lain rawatan
                          yang dirasakan perlu.

                        </label>
                      </div>
                      <div class="col-2">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="d" required>
                      </div>

                    </div>

                    <div class="row mt-3">
                      <div class="col-1">
                        <div class="text-end" for="gridCheck1">
                          5.
                        </div>
                      </div>
                      <div class="col-9">
                        <label class="form-check-label" for="gridCheck1">
                          Saya membenarkan anak saya dibawa melawat oleh guru bersama-sama dengan kanak-kanak lain
                          semasa waktu belajar.
                        </label>
                      </div>
                      <div class="col-2">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="e" required>
                      </div>

                    </div>


                    <div class="row mt-3">
                      <div class="col-1">
                        <div class="text-end" for="gridCheck1">
                          6.
                        </div>
                      </div>
                      <div class="col-9">
                        <label class="form-check-label" for="gridCheck1">
                          Sesuatu kemalangan yang berlaku kepada kanak-kanak diluar sesi persekolahan dan kawasan TABIKA
                          adalah tanggungjawab
                          ibu/bapa/penjaga.
                        </label>
                      </div>
                      <div class="col-2">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="f" required>
                      </div>

                    </div>



                    <div class="row mt-3">
                      <b class="">Muat naik Gambar Berukuran Passport Kanak-Kanak
                      </b>
                      <div class="col-12">
                        <input class="form-control" type="file" id="gambarpassport"  accept="image/png,image/jpeg"  name="gambarpassport" required>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <b class="">Muat naik Salinan MyKID
                      </b>
                      <div class="col-12">
                        <input class="form-control" type="file" id="mykid" name="mykid"  accept="application/pdf"  required>
                      </div>
                    </div>


                    <div class="row mt-3">
                      <b class="">Muat naik Sijil Kelahiran Kanak-Kanak
                      </b>
                      <div class="col-12">
                        <input class="form-control" type="file" id="sijillahir" name="sijillahir"  accept="application/pdf"  required>
                      </div>
                    </div>




                    <div class="row mt-3">
                      <b class="">Muat naik Salinan Rekod Kesihatan Kanak-Kanak
                      </b>
                      <div class="col-12">
                        <input class="form-control" type="file" id="kesihatan"  accept="application/pdf"  name="kesihatan" required>
                      </div>
                    </div>

                    <div class="col-12 mt-3">
                      <button class="btn btn-primary w-100" type="submit" name="borangkemasukan-d">Seterusnya</button>
                    </div>
                  </form>



                  <!-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div> -->

                </div>
              </div>

              <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <?php include('footerscript.php') ?>

</body>

</html>