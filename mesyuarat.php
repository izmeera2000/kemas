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
      <h1>Mesyuarat</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Mesyuarat</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-12">
          <div class="row">


            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card customers-card">



                <div class="card-body">
                  <h5 class="card-title">Mesyuarat <span>| Total</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $query = "SELECT COUNT(*) FROM  meeting   ";
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)) {

                        $jumlahmurid = $row['COUNT(*)'];
                      }
                      ?>
                      <h6>
                        <?php echo $jumlahmurid ?>
                        <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#largeModal">Tambah</span>
                      </h6>
                      <!-- <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span> -->

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">



                <div class="card-body">
                  <h5 class="card-title">Mesyuarat <span>| Active</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <?php
                      $query = "SELECT COUNT(*) FROM  meeting   WHERE status='1' ";
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






            <!-- <div class="col">
              <?php
              ?>
              <img src="<?php createqr('kemas_mesyuarat://test2');
              ?>" alt="Red dot" />
            </div> -->


            
          </div>

          <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
            <h5 class="card-title">Senarai Mesyuarat</h5>
              <!-- <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

              <!-- Table with stripped rows -->
              <table class="table datatable" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Dibuat Oleh</th>
                    <th scope="col">Tarikh Mula</th>
                    <th scope="col">Tarikh Akhir</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  $query = "SELECT * FROM meeting WHERE status='0' ";
                  $result = mysqli_query($db, $query);

                  while ($row = mysqli_fetch_assoc($result)) { ?>


                    <tr>
                      <th scope="row">
                        <?php echo $row['id'] ?>
                      </th>
                      <td>
                        <?php echo $row['nama'] ?>
                      </td>
                      <td>
                        <?php echo $row['created_by'] ?>
                      </td>
                      <td>
                        <?php echo $row['tarikh_akhir'] ?>
                      </td>
                      <td>
                        <?php echo $row['tarikh_mula'] ?>
                      </td>
                      <td>
                        <form method="post" action="">
                          <input type="hidden" id="meetingid" name="meetingid" value="<?php echo $row['id'] ?>">
                          <button type="submit" name="meetingdetail" class="btn btn-primary"><i
                              class="bi bi-person"></i>
                        </form>
                      </td>
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
  </main><!-- End #main -->



  <?php include('footerscript.php') ?>
</body>

</html>