<?php include('functions.php') ?>
<?php 
// header( "refresh:5;url=lamanutama.php" );

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KEMAS - Borang Kemasukan Tamat</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <?php include('head.php') ?>

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

                    <!-- <div class="pt-4 pb-4 ">
                      <h5 class="card-title text-center pb-0 fs-4">Borang Kemasukan</h5>
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
                          <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#borangkemasukan-a" type="button" role="tab" aria-controls="home"
                            aria-selected="true">BAHAGIAN C</button>
                        </li>
                        <li class="nav-item flex-fill" role="presentation">
                          <button class="nav-link w-100 disabled" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#borangkemasukan-a" type="button" role="tab" aria-controls="home"
                            aria-selected="true">BAHAGIAN D</button>
                        </li>


                      </ul>
                    </div> -->

                    <h5 class="card-title">Permohonan Kemasukan Anak Anda Sedang Dinilai</h5>
                    <b class=" text-center">Sila tunggu sementara sehingga permohonan anda diluluskan
                    </b>

                    <div class="row">
                      <div class="col-12 mt-3 d-flex flex-column align-items-center">

                        <div class="spinner-border" role="status"></div>
                        <!-- <p>bahagianC.pdf</p> -->
                        <!-- <a href="assets/pdf/kemasukan/bahagianC.pdf" class="btn btn-primary" download>
                          Muat Turun <i class="bi bi-file-earmark-arrow-down"></i>
                        </a> -->
                      </div>

                    </div>

                    <!-- <div class="row mt-3">
                      <b class="">Muat naik Perakuan
                      </b>
                      <div class="col-12">
                        <input class="form-control" type="file" id="bahagianc" name="bahagianc"  accept="application/pdf" required>
                      </div>
                    </div>

                    <div class="row mt-3">
                      <b class="">Muat naik Slip Gaji
                      </b>
                      <div class="col-12">
                        <input class="form-control" type="file" id="slipgaji" name="slipgaji"  accept="application/pdf" required>
                      </div>
                    </div> -->

                    <div class="col-12 mt-3">
                      <a class="btn btn-primary w-100" href="lamanutama.php">Pergi Ke Laman Utama</a>
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