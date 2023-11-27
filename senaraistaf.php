<?php include('functions.php') ?>

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


  <?php include('sidebar.php') ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Staf</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <!-- <li class="breadcrumb-item">Tables</li> -->
          <li class="breadcrumb-item active">Senarai</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <div class="card-title">
                <!-- <input type="hidden" id="studentid" name="studentid" value="<?php echo $row['id'] ?>"> -->
                <?php if (($_SESSION['level']) == 1) {
                  ?>
                  <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDialogScrollable"><i
                      class="bi bi-plus"></i><i class="bi bi-person"></i></button>
                <?php } ?>
              </div>
              <!-- <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Tarikh Mula</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $username = $_SESSION['username'];
                  $query = "SELECT * FROM staf WHERE NOT idpengguna='$username' ";
                  $result = mysqli_query($db, $query);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $idpengguna = $row['idpengguna'];
                    ?>


                    <tr>
                      <th scope="row">
                        <?php echo $row['id'] ?>
                      </th>
                      <td>
                        <?php echo $row['idpengguna'] ?>
                      </td>
                      <?php
                      $query2 = "SELECT * FROM staf_profile WHERE idpengguna='$idpengguna' ";
                      $result2 = mysqli_query($db, $query2);

                      while ($row2 = mysqli_fetch_assoc($result2)) { ?>

                        <td>
                          <?php echo $row2['nama'] ?>
                        </td>
                        <td>
                          <?php echo $row2['umur'] ?>
                        </td>

                      <?php } ?>
                      <td>
                        <?php echo $row['tarikh'] ?>
                      </td>
                      <td>
                        <form method="post" action="?profilmurid">
                          <input type="hidden" id="studentid" name="studentid" value="<?php echo $row['id'] ?>">
                          <button type="submit" name="profilmurid" class="btn btn-primary"><i
                              class="bi bi-person"></i></button>
                          <button type="submit" name="deletestaf" class="btn btn-primary"><i
                              class="bi bi-card-checklist"></i></button>
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
    </section>
    <form class="row g-3 needs-validation" method="post" action="?">
      <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Staf</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body profile-card">
              


              


            
              <h5 class="card-title mt-3">Sains Awal</h5>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Proses Sains</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="sainsawal1" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Penerokaan</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="sainsawal2" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>


          


              <h5 class="card-title mt-3">Kemanusiaan</h5>
              <div class="col-12 ">
                <!-- <label for="yourUsername" class="form-label fw-bold">Pengalaman Pranombor</label> -->
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="kemanusiaan" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

              <h5 class="card-title mt-3">Catatan</h5>
              <div class="col-12 ">
                <!-- <label for="yourUsername" class="form-label fw-bold">Pengalaman Pranombor</label> -->
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="catatan" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" name="tambahpemarkahan">Save changes</button>
            </div>
          </div>

        </div>
      </div>
      </div><!-- End Modal Dialog Scrollable-->
    </form>
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