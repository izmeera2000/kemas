<?php include('functions.php') ?>



<!DOCTYPE html>
<html lang="en">

<head>


  <title>KEMAS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


<?php include('head.php')?>


</head>

<body>

  <main>
    <div class="container">

      <section class="section min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
          <div class="row justify-content-center d-flex">
            <div class="col d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class=" d-flex align-items-center w-auto ">
                  <img src="assets/img/kemaslogo.png" alt="">
                  <!-- <span class="d-none d-lg-block">KEMAS</span> -->
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Tadika Kemas Taman Tekkah</h5>
                    <p class="text-center small">SISTEM PENGURUSAN & PENTAKSIRAN TADIKA KEMAS</p>
                  </div>

                  <form class="row  needs-validation" method="post" novalidate>
                    <?php include('errors.php'); ?>

                    <!-- <div class="col-12">
                      <label for="yourUsername" class="form-label">ID Pengguna</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Kata Laluan</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                    </div> -->

                    <!--                   <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> -->
                    <div class="col-4">
                      <a class="btn btn-primary w-100" href="LoginStaff.php">Log Masuk Staf</a>
                    </div>
                    <div class="col-4">
                      <a class="btn btn-primary w-100" href="borangkemasukan-a.php">Kemasukan Baharu</a>
                    </div>
                    <div class="col-4">
                      <a class="btn btn-primary w-100" href="Login.php">Log Masuk Ibubapa</a>
                    </div>
                    <!-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div> -->
                  </form>

                </div>
              </div>


            </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>