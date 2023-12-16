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


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Pemarkahan</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Murid</li>
          <li class="breadcrumb-item active">Pemarkahan</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row mb-4">
        <div class="col-4">
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
          <div class="card h-100">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="assets/murid/<?php echo $ic; ?>/<?php echo $gambar; ?>" alt="Profile" class="">
              <h2>
                <?php echo $nama; ?>
              </h2>
              <div class="social-links mt-2">

              </div>
            </div>
          </div>




        </div>

        <div class="col-8">

          <div class="card h-100">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#profile-overview">Tarikh</button>
                </li>
                <?php

                if (($_SESSION['level']) >= 1) {
                  ?>
                  <li class="nav-item">
                    <button class="btn btn-primary" data-bs-toggle="modal"
                      data-bs-target="#modalDialogScrollable">Tambah</button>
                  </li>
                <?php }
                ?>
              </ul>
              <div class="tab-content pt-3 ">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <!-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque
                    temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem
                    eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> -->

                  <h5 class="card-title">Tahun</h5>
                  <form method="post">
                    <div class="col-12 mt-3">
                      <div class="input-group has-validation">

                        <select class="form-select" aria-label="Default select example" name="tahun" required>
                          <option selected disabled>Pilih Tahun</option>
                          <?php
                          $id = $_SESSION['idmurid'];
                          $query = "SELECT DATE_FORMAT(tarikh,'%Y') as tarikh2 FROM pemarkahan WHERE murid_id='$id' ";
                          $result = mysqli_query($db, $query);
                          while ($row = mysqli_fetch_assoc($result)) { ?>
                            <option value="<?php echo $row['tarikh2'] ?>" name="tahun">
                              <?php echo $row['tarikh2'] ?>
                            </option>

                            <?php

                          }
                          ?>
                        </select>
                        <button type="submit" name="tahunpemarkahan"
                          class="btn btn-primary input-group-text">Pilih</button>

                      </div>
                    </div>
                  </form>






                </div>


              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
      <?php
      if (isset($_SESSION['tahundipilih'])) {
        $id = $_SESSION['idmurid'];
        $tarikh = $_SESSION['tahundipilih'];

        $query = "SELECT * FROM pemarkahan WHERE murid_id='$id' AND tarikh LIKE '%$tarikh%' LIMIT 1 ";
        $result = mysqli_query($db, $query);
        while ($row = mysqli_fetch_assoc($result)) { ?>
          <div class="row">

            <div class="col-12">

              <div class="card">
                <div class="card-body pt-3">
                  <!-- Bordered Tabs -->

                  <div class="tab-content pt-3">

                    <div class="tab-pane fade show active profile-overview" id="profile-overview">





                      <form method="post">
                        <input type="hidden" name="tahun" value="<?php echo $row['tarikh'] ?>">
                        <input type="hidden" name="id" value="<?php echo $id ?>">
                        <button type="submit" name="download-pdf" class="btn btn-primary mt-2">Download</button>
                      </form>
                      <h5 class="card-title">Bahasa Melayu</h5>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">MENDENGAR DAN BERTUTUR</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['bm1'] ?>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">MEMBACA</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['bm2'] ?>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">MENULIS</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['bm3'] ?>
                        </div>
                      </div>


                      <h5 class="card-title">Bahasa Inggeris</h5>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">LISTENING AND SPEAKING</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['bi1'] ?>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">READING</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['bi2'] ?>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">WRITING</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['bi3'] ?>
                        </div>
                      </div>


                      <h5 class="card-title">Pedidikan Islam</h5>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">AL-QURAN</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['pi1'] ?>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">AKIDAH</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['pi2'] ?>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">IBADAH</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['pi3'] ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">SIRAH</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['pi4'] ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">AKHLAK</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['pi5'] ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">JAWI</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['pi6'] ?>
                        </div>
                      </div>

                      <h5 class="card-title">Keterampilan Diri</h5>

                      <div class="row">
                        <div class="col">
                          <?php echo $row['keterampilan'] ?>
                        </div>
                      </div>



                      <h5 class="card-title">Perkembangan Fizikal Dan Penjagaan Kesihatan</h5>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">PERKEMBANGAN MOTOR HALUS</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['perkem1'] ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">PERKEMBANGAN MOTOR KASAR</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['perkem2'] ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">MANIPULASI</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['perkem3'] ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">PERGERAKAN BERIRAMA</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['perkem4'] ?>
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">PENDIDIKAN KESIHATAN REPRODUKTIF DAN SOSIAL (PEERS)</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['perkem5'] ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">PEMAKANAN</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['perkem6'] ?>
                        </div>
                      </div>

                      <h5 class="card-title">Kreativiti Dan Estetika</h5>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">MUZIK</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['kreativ1'] ?>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">SENI VISUAL</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['kreativ2'] ?>
                        </div>
                      </div>

                      <h5 class="card-title">Sains Awal</h5>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">PROSES SAINS</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['sainsawal1'] ?>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">PENEROKAAN</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['sainsawal2'] ?>
                        </div>
                      </div>


                      <h5 class="card-title">Matematik Awal</h5>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">PENGALAMAN PRANOMBOR</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['matematikawal1'] ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">KONSEP NOMBOR</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['matematikawal2'] ?>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">OPERASI NOMBOR</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['matematikawal3'] ?>
                        </div>
                      </div>


                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">NILAI WANG</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['matematikawal4'] ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">MASA DAN WAKTU</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['matematikawal5'] ?>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-3 col-md-4 label ">BENTUK DAN RUANG</div>
                        <div class="col-lg-9 col-md-8">
                          <?php echo $row['matematikawal6'] ?>
                        </div>
                      </div>

                      <h5 class="card-title">Kemanusiaan</h5>
                      <div class="row">
                        <!-- <div class="col-lg-3 col-md-4 label ">BENTUK DAN RUANG</div> -->
                        <div class="col">
                          <?php echo $row['kemanusiaan'] ?>
                        </div>
                      </div>


                      <h5 class="card-title">Catatan</h5>
                      <div class="row">
                        <!-- <div class="col-lg-3 col-md-4 label ">BENTUK DAN RUANG</div> -->
                        <div class="col">
                          <?php echo $row['catatan'] ?>
                        </div>
                      </div>


                    </div><!-- End Bordered Tabs -->


                  </div>
                </div>

              </div>
            </div>
          </div>

          <?php
        }
      }
      ?>
    </section>
    <!-- Modal Dialog Scrollable -->
    <form class="row g-3 needs-validation" method="post" action="?">
      <div class="modal fade" id="modalDialogScrollable" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Tambah Pemarkahan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body profile-card">
              <?php
              $id = $_SESSION['idmurid'];

              ?>
              <input type="hidden" value="<?php echo $id; ?>" name="murid_id">
              <h5 class="card-title ">Bahasa Melayu</h5>

              <div class="col-12  mt-1">
                <label for="yourUsername" class="form-label fw-bold fw-bold">Mendengar Dan Bertutur</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="bm1" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

              <div class="col-12  mt-1">
                <label for="yourUsername" class="form-label fw-bold">Membaca</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="bm2" style="height: auto;"></textarea>

                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12  mt-1">
                <label for="yourUsername" class="form-label fw-bold">Menulis</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="bm3" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>


              <h5 class="card-title mt-3 ">Bahasa Inggeris</h5>

              <div class="col-12">
                <label for="yourUsername" class="form-label fw-bold">Listening And Speaking</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="bi1" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

              <div class="col-12  mt-1">
                <label for="yourUsername" class="form-label fw-bold">Reading</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="bi2" style="height: auto;"></textarea>

                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12  mt-1">
                <label for="yourUsername" class="form-label fw-bold">Writing</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="bi3" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

              <h5 class="card-title ">Pendidikan Islam</h5>
              <div class="col-12  mt-1">
                <label for="yourUsername" class="form-label fw-bold">Al-Quran</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="pi1" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12  mt-1">
                <label for="yourUsername" class="form-label fw-bold">Akidah</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="pi2" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12  mt-1">
                <label for="yourUsername" class="form-label fw-bold">Ibadah</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="pi3" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12  mt-1">
                <label for="yourUsername" class="form-label fw-bold">Sirah</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="pi4" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12  mt-1">
                <label for="yourUsername" class="form-label fw-bold">Akhlak</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="pi5" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12  mt-1">
                <label for="yourUsername" class="form-label fw-bold">Jawi</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="pi6" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>


              <h5 class="card-title mt-3">Keterampilan diri</h5>
              <div class="col-12">
                <!-- <label for="yourUsername" class="form-label fw-bold">Al-Quran</label> -->
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="keterampilan" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>



              <h5 class="card-title mt-3">Perkembangan Fizikal Dan Penjagaan Kesihatan</h5>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Perkembangan Motor Halus</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="perkem1" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Perkembangan Motor Kasar</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="perkem2" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Manipulasi</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="perkem3" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Pergerakan berirama</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="perkem4" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Pendidikan Kesihatan Reproduktif Dan Sosial
                  (PEERS)</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="perkem5" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Pemakanan</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="perkem6" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>



              <h5 class="card-title mt-3">Kreativiti Dan Estetika</h5>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Muzik</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="kreativ1" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Seni Visual</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="kreativ2" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

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


              <h5 class="card-title mt-3">Matematik Awal</h5>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Pengalaman Pranombor</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="matematikawal1" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Konsep Nombor</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="matematikawal2" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Operasi Nombor</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="matematikawal3" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Nilai Wang</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="matematikawal4" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>

              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Masa Dan Waktu</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="matematikawal5" style="height: auto;"></textarea>
                  <!-- <div class="invalid-feedback">S</div>   -->
                </div>
              </div>
              <div class="col-12 mt-1">
                <label for="yourUsername" class="form-label fw-bold">Bentuk Dan Ruang</label>
                <div class="input-group has-validation">
                  <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                  <textarea class="form-control" name="matematikawal6" style="height: auto;"></textarea>
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

  <?php include('footerscript.php') ?>

</body>

</html>