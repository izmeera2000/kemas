<?php include('functions.php');
    $ic = $_SESSION['ic'];

$user_check_query = "SELECT * FROM keluarga WHERE no_kad_pengenalan_murid='$ic'";
$resulta = mysqli_query($db, $user_check_query);
$usera = mysqli_num_rows($resulta);
// debug_to_console($usera);
if ($usera >= 2) {
  header('location: borangkemasukan-b2.php');

}
?>

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

                  <form class="row g-3 " method="post" action="?" enctype="multipart/form-data">
                    <h5 class="card-title">PENDAPATAN KELUARGA (Diisi oleh ibu bapa/penjaga)</h5>

                    <div class="col-12 mt-3">
                      <label class="col-form-label">Hubungan</label>
                      <select class="form-select" aria-label="Default select example" name="hubunganA">
                        <option selected disabled>Open this select menu</option>


                        <?php
                        $ic = $_SESSION['ic'];

                        $user_check_query = "SELECT * FROM keluarga WHERE no_kad_pengenalan_murid='$ic'  ";
                        $result = mysqli_query($db, $user_check_query);
                        $row = mysqli_fetch_assoc($result);
                        $hubunganarray = array("Bapa", "Ibu", "Penjaga");

                        foreach ($hubunganarray as $hubungan1) {

                          if ($row["hubungan"] != $hubungan1) { ?>
                            <option value="<?php echo $hubungan1 ?>">
                              <?php echo $hubungan1 ?>
                            </option>
                          <?php
                          }
                        }




                        ?>
                      </select>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nama</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="namaA" class="form-control" id="namaA">
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nombor Kad Pengenalan</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="icA" class="form-control" id="icA">
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Tempat Lahir</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="tempatlahirA" class="form-control" id="tempatlahirA">
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Warganegara</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="warganegaraA" class="form-control" id="warganegaraA">
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Bangsa/Keturunan</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="bangsaA" class="form-control" id="bangsaA">
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>



                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Pekerjaan</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="pekerjaanA" class="form-control" id="pekerjaanA">
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12 mt-3">
                      <label class="col-form-label">Status</label>
                      <select class="form-select" aria-label="Default select example" name="statusA">
                        <option selected disabled>Open this select menu</option>
                        <option value="Kahwin">Kahwin</option>
                        <option value="Duda">Duda</option>
                        <option value="Bujang">Bujang</option>
                      </select>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Pendapatan Sebulan</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">RM</span>
                        <input type="text" name="pendapatanA" class="form-control" id="pendapatanA">
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nombor Telefon Pejabat</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="notelpejabatA" class="form-control" id="notelpejabatA">
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Nama Majikan</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="namamajikanA" class="form-control" id="namamajikanA">
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Alamat Majikan</label>
                      <div class="input-group has-validation">
                        <!-- <span class="input-group-text" id="inputGroupPrepend">@</span> -->
                        <input type="text" name="alamatmajikanA" class="form-control" id="alamatmajikanA">
                        <!-- <div class="invalid-feedback">S</div>   -->
                      </div>
                    </div>


                    <?php
                    $ic = $_SESSION['ic'];

                    $user_check_query = "SELECT * FROM keluarga WHERE no_kad_pengenalan_murid='$ic'  LIMIT 1";
                    $result = mysqli_query($db, $user_check_query);
                    $row = mysqli_fetch_assoc($result);

                    if ($row) { // if user exists
                      ?>
                      <div class="col-6">
                        <a class="btn btn-primary w-100" href="borangkemasukan-b2.php">Skip</a>
                      </div>
                      <div class="col-6">
                        <button class="btn btn-primary w-100" type="submit" name="borangkemasukan-b1">Seterusnya</button>
                      </div>

                      <?php
                    } else {
                      ?>
                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" name="borangkemasukan-b1">Seterusnya</button>
                      </div>
                    <?php } ?>
                    <!-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div> -->
                  </form>

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