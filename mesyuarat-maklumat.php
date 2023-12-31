<?php include('functions.php');
if (!isset($_SESSION['username'])) {
  // $_SESSION['msg'] = "You must log in first";
  header('location: lamanutama.php');
}

$meetingid = $_SESSION['meetingid'];
$query = "SELECT * FROM meeting WHERE id='$meetingid' ";
$results = mysqli_query($db, $query);

while ($row = mysqli_fetch_assoc($results)) {
  $nama2 = $row['nama'];
  $maklumat = $row['maklumat'];
  $tarikh_mula = $row['tarikh_mula'];
  $tarikh_akhir = $row['tarikh_akhir'];
  $status = $row['status'];
}
// echo $nama;
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
      <h1>Mesyuarat -
        <?php echo $nama2 ?>
      </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="mesyuarat.php">Mesyuarat</a></li>
          <li class="breadcrumb-item active">Maklumat</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">


            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">



                <div class="card-body">
                  <h5 class="card-title">Mesyuarat <span>| Nama</span></h5>

                  <div class="d-flex align-items-center">
                    <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div> -->
                    <div class="ps-3">

                      <h6>

                        <?php echo $nama2 ?>
                        <!-- <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">Tambah</span> -->
                      </h6>
                      <!-- <span class="text-muted small pt-2 ps-1">
                        <?php echo $maklumat ?>
                      </span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">



                <div class="card-body">
                  <h5 class="card-title">Mesyuarat <span>| Status</span></h5>

                  <div class="d-flex align-items-center">
                    <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div> -->
                    <div class="ps-3">

                      <h6>

                        <?php if ($status == "0") { ?>
                          <form method="post">
                            <input type="hidden" name="meetingid" value="<?php echo $meetingid ?>">
                            <button class="btn btn-primary" type="submit" name="tamatmesyuarat">Tamat Mesyuarat</button>
                          </form>
                        <?php } else { ?>

                          Tamat
                        <?php } ?>

                      </h6>
                      <!-- <span class="text-muted small pt-2 ps-1">
                        <?php echo $maklumat ?>
                      </span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->
            <div class="col-12">
              <div class="card info-card customers-card">



                <div class="card-body">
                  <h5 class="card-title">Mesyuarat <span>| Maklumat Lanjut</span></h5>

                  <div class="d-flex align-items-center">
                    <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div> -->
                    <div class="ps-3">

                      <h5>

                        <?php echo $maklumat ?>
                        <!-- <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">Tambah</span> -->
                      </h5>
                      <!-- <span class="text-muted small pt-2 ps-1">
                        <?php echo $maklumat ?>
                      </span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">

            </div><!-- End Sales Card -->






            <!-- <div class="col">
              <?php
              ?>

            </div> -->



          </div>



        </div><!-- End Left side columns -->
        <div class="col-lg-4">
          <div class="card info-card sales-card">



            <div class="card-body">
              <h5 class="card-title">Mesyuarat <span>| QR Code</span></h5>

              <div class="d-flex align-items-center">
                <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
      <i class="bi bi-people"></i>
    </div> -->
                <div class="d-flex justify-content-center align-items-center ">


                  <img src="<?php createqr('kemas_mesyuarat://' . $nama2);
                  ?>" alt="Red dot" class="img-fluid mx-auto " />


                  <!-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Kehadiran</h5>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kad Pengenalan</th>
                    <th scope="col">Tarikh Mula</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  $query = "SELECT * FROM meeting_kehadiran WHERE nama_meeting='$nama2' ";
                  $result = mysqli_query($db, $query);

                  while ($row = mysqli_fetch_assoc($result)) { ?>


                    <tr>
                      <th scope="row">
                        <?php echo $row['id'] ?>
                      </th>
                      <td>
                        <?php echo $row['nama_meeting'] ?>
                      </td>
                      <td>
                        <?php echo $row['id_murid']; ?>
                      </td>
                      <td>
                        <?php echo $row['tarikh'] ?>
                      </td>
                      <!-- <td>
                        <?php echo $row['tarikh_mula'] ?>
                      </td> -->
                      <!-- <td>
                        <form method="post" action="">
                          <input type="hidden" id="meetingid" name="meetingid" value="<?php echo $row['id'] ?>">
                          <button type="submit" name="meetingdetail" class="btn btn-primary"><i class="bi bi-person"></i>
                        </form>
                      </td> -->
                    </tr>

                    <?php
                  }
                  ?>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
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
  </main><!-- End #main -->



  <?php include('footerscript.php') ?>


</body>

</html>