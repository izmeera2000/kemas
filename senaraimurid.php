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
      <h1>Murid</h1>
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
              <!-- <h5 class="card-title">Datatables</h5>
              <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p> -->

              <!-- Table with stripped rows -->
              <table class="table datatable" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">IC</th>
                    <th scope="col">Tarikh Mula</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  $query = "SELECT * FROM murid WHERE status_kemasukan='1' ";
                  $result = mysqli_query($db, $query);

                  while ($row = mysqli_fetch_assoc($result)) { ?>


                    <tr>
                      <th scope="row">
                        <?php echo $row['id'] ?>
                      </th>
                      <td>
                        <?php echo $row['name'] ?>
                      </td>
                      <td>
                        <?php echo $row['no_kad_pengenalan'] ?>
                      </td>
                      <td>
                        <?php echo $row['tarikh_mula'] ?>
                      </td>
                      <td>
                        <form method="post" action="?profilmurid">
                          <input type="hidden" id="studentid" name="studentid" value="<?php echo $row['id'] ?>">
                          <button type="submit" name="profilmurid" class="btn btn-primary"><i
                              class="bi bi-person"></i></button>
                          <button type="submit" name="pemarkahan" class="btn btn-primary"><i
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

  </main><!-- End #main -->

  <?php include('footerscript.php') ?>

</body>

</html>