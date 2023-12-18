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
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
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
              <table class="table datatable" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Umur</th>
                    <th scope="col">Tarikh Mula</th>
                    <?php if (($_SESSION['level']) == 1) {
                      ?>
                      <th scope="col">Action</th>
                    <?php } ?>

                  </tr>
                </thead>
                <tbody>

                  <?php
                  $username = $_SESSION['username'];
                  $query = "SELECT * FROM staf WHERE NOT idpengguna='$username' ";
                  $result = mysqli_query($db, $query);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $idpengguna2 = $row['idpengguna'];
                    ?>


                    <tr>
                      <th scope="row">
                        <?php echo $row['id'] ?>
                      </th>
                      <td>
                        <?php echo $row['idpengguna'] ?>
                      </td>
                      <?php
                      $query2 = "SELECT * FROM staf_profile WHERE idpengguna='$idpengguna2' ";
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
                      <?php if (($_SESSION['level']) == 1) {
                        ?>


                        <td>
                          <form method="post" action="?deletestaf">
                            <input type="hidden" id="idstaf" name="idstaf" value="<?php echo $row['id'] ?>">
                            <!-- <button type="submit" name="profilmurid" class="btn btn-primary"><i
                              class="bi bi-person"></i></button> -->
                            <button type="submit" name="deletestaf" class="btn btn-primary"><i
                                class="bi bi-trash"></i></button>
                          </form>
                        </td>
                      <?php } ?>
                    </tr>

                    <?php
                  }
                  ?>

                </tbody>
              </table>
              <!-- End Table with stripped rows -->
<?php var_dump(VAPID::createVapidKeys()); // store the keys afterwards?>
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



              <h5 class="card-title mt-3">ID Pengguna</h5>
              <div class="col-12 mt-1">
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="id" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

              <h5 class="card-title mt-3">Level</h5>
              <div class="col-12 mt-1">
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="level" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

              <h5 class="card-title mt-3">Nama</h5>
              <div class="col-12 mt-1">
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="nama" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

              <h5 class="card-title mt-3">Umur</h5>
              <div class="col-12 mt-1">
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="umur" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" name="tambahstaf">Save changes</button>
            </div>
          </div>

        </div>
      </div>
      </div><!-- End Modal Dialog Scrollable-->
    </form>
  </main><!-- End #main -->

  <?php include('footerscript.php') ?>

</body>

</html>