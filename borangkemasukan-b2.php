<?php include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>KEMAS - Borang Kemasukan Bahagian B</title>
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
                        <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab"
                          data-bs-target="#borangkemasukan-b" type="button" role="tab" aria-controls="home"
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

                  <h5 class="card-title">Tanggungan Ibu/ Bapa/Penjaga</h5>
                  <b class="">(Anak-anak yang telah bekerja atau berumahtangga tidak lagi menjadi tanggungan ibu
                    bapa/penjaga)
                  </b>

                  <div class="col-4 mt-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                      data-bs-target="#verticalycentered">
                      Tambah
                    </button>
                  </div>

                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Perhubungan</th>
                        <th scope="col">Nama Institusi</th>
                        <th scope="col">Nilai Biasiswa/ Bantuan Setahun</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                      $ic = $_SESSION['ic'];
                      $query = "SELECT * FROM keluarga_tanggungan WHERE no_kad_pengenalan_murid='$ic' ";
                      $result = mysqli_query($db, $query);

                      while ($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                          <th scope="row">1</th>
                          <td>
                            <?php echo $row['nama'] ?>
                          </td>
                          <td>
                            <?php echo $row['umur'] ?>
                          </td>
                          <td>
                            <?php echo $row['perhubungan'] ?>
                          </td>
                          <td>
                            <?php echo $row['nama_institusi'] ?>
                          </td>
                          <td>
                            <?php

                            if ($row['nilai_biasiswa'] != '') {
                              echo "RM " . $row['nilai_biasiswa'];
                            } else {
                              echo "Tiada";
                            }
                            ?>
                          </td>
                        </tr>

                        <?php
                      }
                      ?>



                    </tbody>
                  </table>

                  <div class="col-12">
                    <a class="btn btn-primary w-100" href="borangkemasukan-c.php"
                      name="borangkemasukan-b2">Seterusnya</a>
                  </div>




                  <!-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div> -->
                  <div class="modal fade" id="verticalycentered" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Tanggungan Ibu / Bapa / Penjaga <br />(termasuk pemohon)</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="row g-3 needs-validation" method="post" action="?" enctype="multipart/form-data">

                          <div class="modal-body">
                            <div class="container">
                              <div class="col-12">
                                <label for="yourUsername" class="form-label">Nama</label>
                                <div class="input-group has-validation">
                                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                  <input type="text" name="nama" class="form-control" id="nama">
                                  <!-- <div class="invalid-feedback">S</div>   -->
                                </div>
                              </div>
                              <div class="col-12">
                                <label for="yourUsername" class="form-label">Umur</label>
                                <div class="input-group has-validation">
                                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                  <input type="text" name="umur" class="form-control" id="umur">
                                  <!-- <div class="invalid-feedback">S</div>   -->
                                </div>
                              </div>

                              <div class="col-12">
                                <label for="yourUsername" class="form-label">Perhubungan</label>
                                <div class="input-group has-validation">
                                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                  <input type="text" name="perhubungan" class="form-control" id="perhubungan">
                                  <!-- <div class="invalid-feedback">S</div>   -->
                                </div>
                              </div>

                              <div class="col-12">
                                <label for="yourUsername" class="form-label">Nama Institusi (Sekolah, Kolej, IPTA, IPTS
                                  dll
                                  )
                                </label>
                                <div class="input-group has-validation">
                                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                  <input type="text" name="institusi" class="form-control" id="institusi">
                                  <!-- <div class="invalid-feedback">S</div>   -->
                                </div>
                              </div>

                              <div class="col-12">
                                <label for="yourUsername" class="form-label">Nilai Biasiswa / Bantuan Setahuan (jika
                                  ada)</label>
                                <div class="input-group has-validation">
                                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                                  <span class="input-group-text" id="inputGroupPrepend">RM</span>

                                  <input type="text" name="biasiswa" class="form-control" id="biasiswa">

                                  <!-- <div class="invalid-feedback">S</div>   -->
                                </div>
                              </div>







                            </div>
                            <div class="modal-footer">
                              <div class="col-12">
                                <button class="btn btn-primary w-100" type="submit"
                                  name="borangkemasukan-b2-tambah">Tambah</button>
                              </div>

                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div><!-- End Vertically centered Modal-->
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