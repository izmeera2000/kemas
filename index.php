<?php include('functions.php');
if (!isset($_SESSION['username'])) {
  // $_SESSION['msg'] = "You must log in first";
  header('location: lamanutama.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>


  <title>KEMAS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <?php include('head.php') ?>


</head>

<body>

  <?php include('topnav.php') ?>

  <!-- ======= Sidebar ======= -->
  <?php include('sidebar.php') ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">



                <div class="card-body">
                  <h5 class="card-title">Murid <span>| Jumlah</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $query = "SELECT COUNT(*) FROM  murid   WHERE status_kemasukan='1' ";
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)) {

                        $jumlahmurid = $row['COUNT(*)'];
                      }
                      ?>
                      <h6>
                        <?php echo $jumlahmurid ?>
                      </h6>

                      <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">



                <div class="card-body">
                  <h5 class="card-title">Kemasukan <span>| Menunggu</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $query = "SELECT COUNT(*) FROM  murid WHERE status_kemasukan='0'  ";
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)) {

                        $jumlahmurid = $row['COUNT(*)'];
                      }
                      ?>
                      <h6>
                        <?php echo $jumlahmurid ?>
                      </h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->


          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

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