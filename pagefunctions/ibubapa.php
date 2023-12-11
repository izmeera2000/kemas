<?php
if (isset($_POST['login_ibubapa'])) {

$ic = mysqli_real_escape_string($db, $_POST['ic']);

$query = "SELECT * FROM murid WHERE no_kad_pengenalan='$ic' ";
$results = mysqli_query($db, $query);
if (mysqli_num_rows($results) == 1) {
    $_SESSION['username'] = $ic;
    while ($row = mysqli_fetch_assoc($results)) {

        if ($row['status_kemasukan'] != 1) {
            if ($row['status_kemasukan_text'] == "a") {
                header('location: borangkemasukan-b1.php');
                exit();

            }
            if ($row['status_kemasukan_text'] == "b1") {
                header('location: borangkemasukan-b1.php');
                exit();

            }
            if ($row['status_kemasukan_text'] == "b2") {
                header('location: borangkemasukan-b2.php');
                exit();

            }

            if ($row['status_kemasukan_text'] == "c") {

                header('location: borangkemasukan-d.php');
                // array_push($errors, "Borang anda tidak lengkap");
                exit();


            }
            if ($row['status_kemasukan_text'] == "d") {
                header('location: borangkemasukan-menunggu.php');
                exit();

            }
        } else {
            $_SESSION['level'] = 0;
            $_SESSION['idmurid'] = $row['id'];
            header('location: profilmurid.php');

        }
    }
} else {
    array_push($errors, "IC tidak wujud");
}
}?>