<?php include('functions.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/kemaslogo.png" alt="">
        <!-- <span class="d-none d-lg-block">NiceAdmin</span> -->
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">



        <li class="nav-item dropdown pe-3">


          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <!-- <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle"> -->
            <span class="d-none d-md-block dropdown-toggle ps-2">
              <?php echo $_SESSION['username'] ?>
            </span>
          </a><!-- End Profile Iamge Icon -->
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <?php include('sidebar.php') ?>


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">
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

          }


          ?>
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

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                    Password</button>
                </li>

              </ul>
              <div class="tab-content pt-3">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
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

                    <h5 class="card-title">Maklumat <?php echo $row['hubungan'] ?></h5>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nama</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['nama'] ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">No Kad Pengenalan</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['kad_pengenalan'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Warganegara</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['warganegara'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Keturunan</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['keturunan'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Pekerjaan</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['pekerjaan'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Status</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['status'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Pendapatan Sebulan</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['pendapatan_sebulan'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">No Telefon Pejabat</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['no_telefon_pejabat'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Nama Majikan</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['nama_majikan'] ?></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Alamat Majikan</div>
                      <div class="col-lg-9 col-md-8"><?php echo $row['alamat_majikan'] ?></div>
                    </div>
                    <?php
                  }
                  ?>
                </div>



                  <div class="tab-pane fade pt-3" id="profile-settings">

                    <!-- Settings Form -->
                    <form>

                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                        <div class="col-md-8 col-lg-9">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="changesMade" checked>
                            <label class="form-check-label" for="changesMade">
                              Changes made to your account
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="newProducts" checked>
                            <label class="form-check-label" for="newProducts">
                              Information on new products and services
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="proOffers">
                            <label class="form-check-label" for="proOffers">
                              Marketing and promo offers
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                            <label class="form-check-label" for="securityNotify">
                              Security alerts
                            </label>
                          </div>
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                      </div>
                    </form><!-- End settings Form -->

                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <!-- Change Password Form -->
                    <form>

                      <div class="row mb-3">
                        <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="password" type="password" class="form-control" id="currentPassword">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="newpassword" type="password" class="form-control" id="newPassword">
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                          Password</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                        </div>
                      </div>

                      <div class="text-center">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                      </div>
                    </form><!-- End Change Password Form -->

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