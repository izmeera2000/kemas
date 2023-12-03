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

  <!-- ======= Header ======= -->
  <?php include('topnav.php') ?>


  <?php include('sidebar.php') ?>
  <?php
  $id = $_SESSION['idmurid'];
  $query = "SELECT * FROM murid WHERE id='$id' ";
  $result = mysqli_query($db, $query);

  while ($row = mysqli_fetch_assoc($result)) {

    $nama = $row['name'];
    $umur = $row['age'];
    $ic = $row['no_kad_pengenalan'];
    $tarikh_mula = $row['tarikh_mula'];
    $warganegara = $row['warganegara'];
    $bangsa = $row['bangsa'];
    $tarikh_lahir = $row['tarikh_lahir'];
    $no_sijil_lahir = $row['no_sijil_lahir'];
    $tempat_lahir = $row['tempat_lahir'];
    $jantina = $row['jantina'];
    $alamat_rumah = $row['alamat_rumah'];
    $saizbaju = $row['saizbaju'];
    $penyakit = $row['penyakit'];
    $tinggi = $row['tinggi'];
    $berat = $row['berat'];
    $masalah_makanan = $row['masalah_makanan'];
    $kecacatan = $row['kecacatan'];
    $nama_penjaga = $row['nama_penjaga'];
    $alamat_rumah_penjaga = $row['alamat_rumah_penjaga'];
    $telefon_penjaga = $row['telefon_penjaga'];
    $hubungan_penjaga = $row['hubungan_penjaga'];

    $gambar = $row['gambar'];
    $file_mykid = $row['file_mykid'];
    $file_sijil = $row['file_sijil'];
    $file_rekod_kesihatan = $row['file_rekod_kesihatan'];
    $geran = $row['geran'];


    $status_kemasukan = $row['status_kemasukan'];
  }


  ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <?php
          if ($status_kemasukan != 1) { ?>
            <li class="breadcrumb-item">Kemasukan</li>

          <?php } else { ?>
            <li class="breadcrumb-item">Murid</li>

          <?php }

          ?>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/murid/<?php echo $ic; ?>/<?php echo $gambar; ?>" alt="Profile" class="">
              <h2>
                <?php echo $nama; ?>
              </h2>
              <div class="social-links mt-2">

              </div>
            </div>
          </div>


          <?php
          if ($status_kemasukan != 1) {
            ?>
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <form method="post">

                </form>
                <!-- <img src="assets/murid/<?php echo $ic; ?>/<?php echo $gambar; ?>" alt="Profile" class=""> -->
                <h2>
                  Terima Kemasukan
                </h2>
                <!-- <div class="social-links mt-2">

              </div> -->
                <form action="" method="post">
                  <input type="hidden" name="id" value="<?php echo $ic ?>">
                  <div class="row mb-2">
                    <input type="hidden" name="ic" value="<?php echo $ic; ?>">

                    <button type="submit" name="download-pdf-borang" class="btn btn-primary ">PDF</button>
                  </div>

                  <button class="btn btn-primary " type="submit" name="kemasukan-layak">Terima</button>
                  <button class="btn btn-danger " type="submit" name="kemasukan-tidaklayak">Tidak Terima</button>

                </form>
              </div>
            </div>
            <?php
          }
          ?>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Murid</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Ibu Bapa</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Keluarga</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Fail &
                    Perakuan</button>
                </li>

              </ul>
              <div class="tab-content pt-3">

                <div class="tab-pane fade show active profile-overview  pt-3" id="profile-overview">
                  <!-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque
                    temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem
                    eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                  <h5 class="card-title">Maklumat Kanak-kanak</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $nama ?>
                    </div>
                  </div>



                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Warganegara</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $warganegara ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Bangsa/Keturunan</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $bangsa ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tarikh Lahir</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $tarikh_lahir ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Umur</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $umur ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">No. Sijil Lahir</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $no_sijil_lahir ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tempat Lahir</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $tempat_lahir ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jantina</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $jantina ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Alamat Rumah</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $alamat_rumah ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Saiz Baju</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $saizbaju ?>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jenis Penyakit</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $penyakit ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Tinggi</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $tinggi ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Berat</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $berat ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Masalah Makanan</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $masalah_makanan ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Kecacatan</div>
                    <div class="col-lg-9 col-md-8">
                      <?php echo $kecacatan ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Emergency Contact</div>
                    <div class="row col-lg-9 col-md-8">
                      <div class="">
                        <?php echo $nama_penjaga ?>
                      </div>
                      <div class="">
                        <?php echo $alamat_rumah_penjaga ?>
                      </div>
                      <div class="">
                        <?php echo $telefon_penjaga ?>
                      </div>
                      <div class="">
                        <?php echo $hubungan_penjaga ?>
                      </div>

                    </div>

                  </div>
                </div>

                <div class="tab-pane fade profile-overview pt-3" id="profile-edit">




                  <?php



                  $query = "SELECT * FROM keluarga WHERE no_kad_pengenalan_murid='$ic' ORDER BY id ASC ";
                  $result = mysqli_query($db, $query);

                  while ($row = mysqli_fetch_assoc($result)) { ?>

                    <h5 class="card-title">Maklumat
                      <?php echo $row['hubungan'] ?>
                    </h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nama</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['nama'] ?>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">No Kad Pengenalan</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['kad_pengenalan'] ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Warganegara</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['warganegara'] ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Keturunan</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['keturunan'] ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Pekerjaan</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['pekerjaan'] ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Status</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['status'] ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Pendapatan Sebulan</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['pendapatan_sebulan'] ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">No Telefon Pejabat</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['no_telefon_pejabat'] ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nama Majikan</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['nama_majikan'] ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Alamat Majikan</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['alamat_majikan'] ?>
                      </div>
                    </div>

                    <?php
                  }
                  ?>
                </div>



                <div class="tab-pane fade profile-overview pt-3" id="profile-settings">

                  <?php



                  $query = "SELECT * FROM keluarga_tanggungan WHERE no_kad_pengenalan_murid='$ic' ORDER BY id ASC ";
                  $result = mysqli_query($db, $query);
                  $count = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>

                    <h5 class="card-title">Maklumat -
                      <?php echo $count;

                      ?>

                    </h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nama</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['nama'] ?>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Umur</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['umur'] ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Hubungan</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['perhubungan'] ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nama Institusi</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['nama_institusi'] ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nilai Biasiswa (Jika Ada)</div>
                      <div class="col-lg-9 col-md-8">
                        <?php echo $row['nilai_biasiswa'] ?>
                      </div>
                    </div>

                    <?php
                    $count += 1;
                  }
                  ?>
                </div>

                <div class="tab-pane fade profile-overview pt-3" id="profile-change-password">

                  <h5 class="card-title">Perakuan

                  </h5>
                  <?php



                  $query = "SELECT * FROM keluarga WHERE no_kad_pengenalan_murid='$ic' ORDER BY id ASC LIMIT 1 ";
                  $result = mysqli_query($db, $query);

                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">File Slip Gaji</div>
                      <div class="col-lg-9 col-md-8">
                        <a class="btn btn-primary"
                          href="assets/murid/<?php echo $ic; ?>/<?php echo $row['file_slipgaji'] ?>">File</a>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">File Pengesahan Gaji</div>
                      <div class="col-lg-9 col-md-8">
                        <a class="btn btn-primary"
                          href="assets/murid/<?php echo $ic; ?>/<?php echo $row['file_pengesahan'] ?>">File</a>

                        <!-- <?php echo $row['file_pengesahan'] ?> -->
                      </div>
                    </div>


                    <?php
                  }

                  $query = "SELECT * FROM murid WHERE no_kad_pengenalan='$ic' ORDER BY id ASC LIMIT 1 ";
                  $result = mysqli_query($db, $query);

                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">File MyKid</div>
                      <div class="col-lg-9 col-md-8">
                        <a class="btn btn-primary"
                          href="assets/murid/<?php echo $ic; ?>/<?php echo $row['file_mykid'] ?>">File</a>

                        <!-- <?php echo $row['file_mykid'] ?> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">File Sijil</div>
                      <div class="col-lg-9 col-md-8">
                        <a class="btn btn-primary"
                          href="assets/murid/<?php echo $ic; ?>/<?php echo $row['file_sijil'] ?>">File</a>

                        <!-- <?php echo $row['file_sijil'] ?> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">File Rekod Kesihantan</div>
                      <div class="col-lg-9 col-md-8">
                        <a class="btn btn-primary"
                          href="assets/murid/<?php echo $ic; ?>/<?php echo $row['file_rekod_kesihatan'] ?>">File</a>

                        <!-- <?php echo $row['file_rekod_kesihatan'] ?> -->
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Geran Perkapita</div>
                      <div class="col-lg-9 col-md-8">
                        <?php
                        if ($row['geran'] == 1) {
                          echo "Layak";
                        } else {
                          echo "Tidak layak";

                        }
                        ?>
                      </div>
                    </div>
                    <?php
                  }
                  ?>



                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
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