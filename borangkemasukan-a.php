<?php include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KEMAS - Borang Kemasukan Bahagian A</title>
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

                  <div class="pt-4 pb-4 ">
                    <h5 class="card-title text-center pb-0 fs-4">Borang Kemasukan</h5>
                    <!-- <p class="text-center small">Enter your username & password to login</p> -->
                    <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                      <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                          data-bs-target="#borangkemasukan-a" type="button" role="tab" aria-controls="home"
                          aria-selected="true">BAHAGIAN A</button>
                      </li>
                      <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 disabled" id="home-tab" data-bs-toggle="tab"
                          data-bs-target="#borangkemasukan-a" type="button" role="tab" aria-controls="home"
                          aria-selected="true">BAHAGIAN B</button>
                      </li>
                      <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 disabled" id="home-tab" data-bs-toggle="tab"
                          data-bs-target="#borangkemasukan-a" type="button" role="tab" aria-controls="home"
                          aria-selected="true">BAHAGIAN C</button>
                      </li>
                      <li class="nav-item flex-fill" role="presentation">
                        <button class="nav-link w-100 disabled" id="home-tab" data-bs-toggle="tab"
                          data-bs-target="#borangkemasukan-a" type="button" role="tab" aria-controls="home"
                          aria-selected="true">BAHAGIAN D</button>
                      </li>


                    </ul>
                  </div>

                  <form class="row g-3 needs-validation" method="post" action="">
                    <?php include('errors.php'); ?>

                    <h5 class="card-title mt-3">Maklumat Murid</h5>


                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nombor Kad Pengenalan</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="ic" class="form-control" id="ic" required>
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nama Kanak-Kanak</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="nama" class="form-control" id="nama" required>
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Warganegara</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="warganegara" class="form-control" id="warganegara" required>
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Bangsa/Keturunan</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="bangsa" class="form-control" id="bangsa" required>
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>



                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nombor Sijil Lahir</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="nosijillahir" class="form-control" id="nosijillahir" required>
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Tempat Lahir</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="tempatlahir" class="form-control" id="tempatlahir" required>
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>


                    <div class="col-12 mt-3">
                      <label class="col-form-label">Jantina</label>
                      <select class="form-select" aria-label="Default select example" name="jantina" required>
                        <option selected disabled>Open this select menu</option>
                        <option value="Lelaki">Lelaki</option>
                        <option value="Perempuan">Perempuan</option>

                      </select>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Alamat Rumah</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="alamat" class="form-control" id="alamat" required>
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>


                    <div class="col-12 mt-3">
                      <label class="col-form-label">Saiz Baju</label>
                      <select class="form-select" aria-label="Default select example" name="saizbaju" required>
                        <option selected disabled>Open this select menu</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                      </select>
                    </div>


                    <div class="col-12 mt-3">
                      <label class="col-form-label">Jenis Penyakit</label>
                      <select class="form-select" aria-label="Default select example" name="penyakit" required>
                        <option selected value="Tiada Penyakit">Tiada Penyakit</option>
                        <option value="Lelah">Lelah</option>
                        <option value="Sawan">Sawan</option>
                        <option value="Campak">Campak</option>
                        <option value="Penyakit Kuning">Penyakit Kuning</option>
                        <option value="Jantung Berlubang">Jantung Berlubang</option>
                        <option value="Autism">Autism</option>
                        <option value="Disleksia">Disleksia</option>
                        <option value="OKU">OKU</option>
                        <option value="ADHD (Hyperaktif)">ADHD (Hyperaktif)</option>

                      </select>
                    </div>


                    <div class="col-12">
                      <div class="row mt-3">
                        <label for="yourUsername" class="form-label">Fizikal Kanak-Kanak</label>
                        <div class="col-6">
                          <div class="input-group has-validation">
                            <input type="text" name="tinggi" class="form-control" id="tinggi" required>
                            <span class="input-group-text" id="inputGroupPrepend">cm</span>
                            <!-- <div class="invalid-feedback">S</div>   -->
                          </div>
                        </div>
                        <div class="col-6">
                          <div class="input-group has-validation">
                            <input type="text" name="berat" class="form-control" id="berat" required>
                            <span class="input-group-text" id="inputGroupPrepend">KG</span>
                            <!-- <div class="invalid-feedback">S</div>   -->
                          </div>
                        </div>
                      </div>

                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Masalah makanan/alahan (jika ada)</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="masalahmakanan" class="form-control" id="masalahmakanan" >
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Kecacatan (jika ada)</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="kecacatan" class="form-control" id="kecacatan" >
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <h5 class="card-title mt-3">Maklumat Penjaga</h5>


                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nama</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="kecemasannama" class="form-control" id="kecemasannama" required>
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>


                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Alamat</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="kecemasanalamat" class="form-control" id="kecemasanalamat" required>
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>


                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nombor Telefon</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="kecemasantelefon" class="form-control" id="kecemasantelefon" required>
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Hubungan</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="kecemasanhubungan" class="form-control" id="kecemasanhubungan"
                          required>
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>


                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="borangkemasukan-a">Seterusnya</button>
                    </div>
                    <!-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div> -->
                  </form>

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