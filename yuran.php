<?php include('functions.php');
if (!isset($_SESSION['username'])) {
  // $_SESSION['msg'] = "You must log in first";
  header('location: lamanutama.php');
}
// $arraysds = array();
// $query = "SELECT * FROM murid  ";
// $result = mysqli_query($db, $query);
// while ($row = mysqli_fetch_assoc($result)) {
//   $arraysds[] = $row['id'];


// }
// $arastring = "";
// foreach ($arraysds as $x => $val) {

//   if (!next($arraysds)) {
//     $arastring .= '"' . $val . '"';

//   } else {

//     $arastring .= '"' . $val . '"' . ',';
//   }
// }
if (isset($_POST['tarikhyuran2'])) {
  $date = $_SESSION['tarikhyuran'];
} else {
  $date = date('Y-m');
}
// debug_to_console($_SESSION['tarikhyuran']);
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
      <h1>Yuran</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Yuran</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-12">
          <div class="row">
            <?php

            if ($_SESSION['level'] >= 1) { ?>

              <!-- Revenue Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">



                  <div class="card-body">
                    <h5 class="card-title">Yuran <span>| Total Sudah Bayar(Bulan
                        <?php


                        echo date('M Y', strtotime($date));

                        ?>)
                      </span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person-check"></i>
                      </div>
                      <div class="ps-3">
                        <?php
                        $query = "SELECT
                        COUNT(*)
                        FROM
                        murid
                        LEFT JOIN yuran  ON murid.id = yuran.id_murid AND yuran.tarikh LIKE '%$date%' 
                        WHERE id_murid IS NOT NULL ";
                        $result = mysqli_query($db, $query);
                        while ($row = mysqli_fetch_assoc($result)) {

                          $jumlahmurid = $row['COUNT(*)'];
                        }
                        ?>
                        <h6>
                          <?php echo $jumlahmurid ?>
                        </h6>

                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Revenue Card -->

              <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">



                  <div class="card-body">
                    <h5 class="card-title">Yuran <span>| Tarikh
                      </span></h5>

                    <div class="d-flex align-items-center">

                      <div class="ps-3">
                        <form method="post">
                          <div class="row mb-3">
                            <!-- <label for="inputDate" class="col-sm-2 col-form-label">Date</label> -->
                            <div class="col-10">
                              <input type="month" class="form-control" name="tarikhyuran">
                            </div>
                            <div class="col-2">
                              <button class="btn btn-primary" type="submit" name="tarikhyuran2">Tambah</button>
                              <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->
                            </div>

                          </div>
                        </form>

                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Revenue Card -->








            </div>



            <div class="row">
              <div class="col-lg-12">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Senarai Yuran Belum Bayar (
                      <?php echo date('M Y', strtotime($date)); ?>)
                    </h5>

                    <table class="table datatable" style="width:100%">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">IC</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php

                        $query = "SELECT
                        *, murid.id 
                        FROM
                        murid
                        LEFT JOIN yuran  ON murid.id = yuran.id_murid AND yuran.tarikh LIKE '%$date%' 
                        WHERE id_murid IS  NULL ";
                        // echo $query;
                        $result = mysqli_query($db, $query);
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                          ?>


                          <tr>
                            <th scope="row">
                              <?php echo $counter ?>
                            </th>
                            <td>
                              <?php echo $row['no_kad_pengenalan'] ?>
                            </td>



                            <td>
                              <form method="post" action="">
                                <input type="hidden" name="id_murid" value="<?php echo $row['id'] ?>">
                                <button type="submit" name="yuranbayar" class="btn btn-success"><i
                                    class="bi bi-cash-stack"></i>
                              </form>
                            </td>
                          </tr>

                          <?php
                          $counter += 1;
                        }
                        ?>

                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                  </div>
                </div>

              </div>
              <div class="col-lg-12">

                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Senarai Yuran Sudah Bayar (
                      <?php echo date('M Y', strtotime($date)); ?>)
                    </h5>

                    <table class="table datatable" style="width:100%">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">IC</th>
                          <th scope="col">Tarikh Bayar</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php

                        $query =
                          "SELECT
                          *
                          FROM
                          murid
                          LEFT JOIN yuran  ON murid.id = yuran.id_murid AND yuran.tarikh LIKE '%$date%' 
                          WHERE id_murid IS NOT NULL ";
                        // echo $query;
                        $result = mysqli_query($db, $query);
                        $counter = 1;
                        while ($row = mysqli_fetch_assoc($result)) {

                          ?>


                          <tr>
                            <th scope="row">
                              <?php echo $counter ?>
                            </th>
                            <td>
                              <?php echo $row['no_kad_pengenalan'] ?>
                            </td>
                            <td>
                              <?php echo date("M Y", strtotime($row['tarikh'])) ?>
                            </td>


                            <td>
                              <form method="post" action="">
                                <input type="hidden" id="id_murid" name="id_murid" value="<?php echo $row['id'] ?>">
                                <input type="hidden" id="tarikh" name="tarikh" value="<?php echo $row['tarikh'] ?>">
                                <button type="submit" name="yurantidakbayar" class="btn btn-danger"><i
                                    class="bi bi-cash-stack"></i>
                              </form>
                            </td>
                          </tr>

                          <?php
                          $counter += 1;
                        }
                        ?>

                      </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                  </div>
                </div>

              </div>
            </div>
          <?php } else {

              ?>

            <div class="col-lg-12">

              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Senarai Yuran Sudah Bayar
                  </h5>

                  <table class="table datatable" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">IC</th>
                        <th scope="col">Tarikh Bayar</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $ic = $_SESSION['username'];
                      $query =
                        "SELECT
          *
          FROM
          murid
          LEFT JOIN yuran  ON murid.id = yuran.id_murid
          WHERE no_kad_pengenalan='$ic' AND id_murid IS NOT NULL ";
                      // echo $query;
                      $result = mysqli_query($db, $query);
                      $counter = 1;
                      while ($row = mysqli_fetch_assoc($result)) {

                        ?>


                        <tr>
                          <th scope="row">
                            <?php echo $counter ?>
                          </th>
                          <td>
                            <?php echo $row['no_kad_pengenalan'] ?>
                          </td>
                          <td>
                            <?php echo date("M Y", strtotime($row['tarikh'])) ?>
                          </td>



                        </tr>

                        <?php
                        $counter += 1;
                      }
                      ?>

                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->

                </div>
              </div>

            </div>




          <?php } ?>

        </div><!-- End Left side columns -->


      </div>
    </section>


    <div class="modal fade" id="largeModal" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <form action="" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Mesyuarat</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" required>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Maklumat</label>
                <div class="col-sm-10">
                  <textarea type="text" class="form-control" name="maklumat" required></textarea>
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Mula

                </label>
                <div class="col-sm-10">
                  <input type="datetime-local" class="form-control" name="date1" min="<?php echo date('Y-m-d\TH:i');
                  ?>" required>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputDate2" class="col-sm-2 col-form-label">Tamat</label>
                <div class="col-sm-10">
                  <input type="datetime-local" class="form-control" name="date2" min="<?php echo date('Y-m-d\TH:i');
                  ?>" required>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="tambahmesyuarat">Save changes</button>
            </div>
          </div>
        </form>
      </div>
    </div><!-- End Large Modal-->

    <div class="modal fade" id="scanqrcode" tabindex="-1">
      <div class="modal-dialog modal-lg">
        <form action="" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Scan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
              <div id="qr-reader" style="width:100%"></div>
              <div id="qr-reader-results"></div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <!-- <button type="submit" class="btn btn-primary" name="tambahmesyuarat">Save changes</button> -->
            </div>
          </div>
        </form>
      </div>
    </div><!-- End Large Modal-->
  </main><!-- End #main -->



  <?php include('footerscript.php') ?>


  <script>
    function startqrcodescan() {
      var myModal = new bootstrap.Modal(document.getElementById('scanqrcode'), {
        keyboard: false
      });
      myModal.show();

      var resultContainer = document.getElementById('qr-reader-results');
      var lastResult, countResults = 0;

      function onScanSuccess(decodedText, decodedResult) {
        if (decodedText !== lastResult) {
          ++countResults;
          lastResult = decodedText;
          console.log(`Scan result ${decodedText}`, decodedResult);

          $.post('functions.php', { qrcodescan: decodedText, idmurid: "<?php echo $_SESSION['username'] ?>" });
          // console.log("testpost");
          html5QrcodeScanner.clear();
          myModal.hide();

        }
      }
      const config = { fps: 10, qrbox: { width: 250, height: 250 } };

      var html5QrcodeScanner = new Html5QrcodeScanner(
        "qr-reader", {
        fps: 24,
        qrbox: 250,
        supportedScanTypes: [Html5QrcodeScanType.SCAN_TYPE_CAMERA],
        rememberLastUsedCamera: true,


      });
      html5QrcodeScanner.render(onScanSuccess);
    }
  </script>
</body>

</html>