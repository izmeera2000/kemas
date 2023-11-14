<?php

session_start();
// initializing variables
$username = "";
$email = "";
$errors = array();
$errors2 = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'kemas');


if (isset($_POST['login_staff'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);




    // $password = md5($password);
    $query = "SELECT * FROM staf WHERE idpengguna='$username' AND katalaluan='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    } else {
        array_push($errors, "Wrong username/password combination");
    }

}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login.php");
}


function debug_to_console($data)
{
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}








if (isset($_POST['profilmurid'])) {
    $_SESSION['idmurid'] = $_POST['studentid'];
    header('location: profilmurid.php');

}

if (isset($_POST['borangkemasukan-a'])) {
    // $_SESSION['idmurid'] =$_POST['studentid'];
    foreach ($_POST as $key => $value) {
        // echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        debug_to_console($key . " : " . $value);
    }

    $tahunlahir = substr($_POST['ic'], 0, 2);
    $bulanlahir = substr($_POST['ic'], 2, 2);
    $harilahir = substr($_POST['ic'], 4, 2);
    // if ($tahunlahir >= 30){
    //     $tahunlahir += 1900;
    // }
    // else{
    $tahunlahir += 2000;
    // }

    $ic = $db->real_escape_string($_POST['ic']);
    $nama = $db->real_escape_string($_POST['nama']);
    $warganegara = $db->real_escape_string($_POST['warganegara']);
    $bangsa = $db->real_escape_string($_POST['bangsa']);
    $nosijillahir = $db->real_escape_string($_POST['nosijillahir']);
    $tempatlahir = $db->real_escape_string($_POST['tempatlahir']);
    $jantina = $db->real_escape_string($_POST['jantina']);
    $alamat = $db->real_escape_string($_POST['alamat']);
    $saizbaju = $db->real_escape_string($_POST['saizbaju']);
    $penyakit = $db->real_escape_string($_POST['penyakit']);
    $tinggi = $db->real_escape_string($_POST['tinggi']);
    $berat = $db->real_escape_string($_POST['berat']);
    $masalahmakanan = $db->real_escape_string($_POST['masalahmakanan']);
    $kecacatan = $db->real_escape_string($_POST['kecacatan']);
    $kecemasannama = $db->real_escape_string($_POST['kecemasannama']);
    $kecemasanalamat = $db->real_escape_string($_POST['kecemasanalamat']);
    $kecemasantelefon = $db->real_escape_string($_POST['kecemasantelefon']);
    $kecemasanhubungan = $db->real_escape_string($_POST['kecemasanhubungan']);



    debug_to_console($tahunlahir);
    debug_to_console($bulanlahir);
    debug_to_console($harilahir);

    $datenow = new DateTime(date('Y'));
    // debug_to_console($datenow);
    $tahunlahir = 2000;
    $stringdate = $tahunlahir . "-00-00";
    $datebirth = new DateTime(date($stringdate));
    // debug_to_console($datebirth);
    $umur = (date_diff($datenow, $datebirth))->y;

    debug_to_console($umur);


    $datebirth =  date("Y-m-d", strtotime("$tahunlahir-$bulanlahir-$harilahir"));


    $user_check_query = "SELECT * FROM murid WHERE no_kad_pengenalan='$ic'";
    $resulta = mysqli_query($db, $user_check_query);
    $usera = mysqli_fetch_assoc($resulta);


    // debug_to_console($ageofthem);
    if ($usera) {
        array_push($errors, "IC wujud di dalam database");

    } else {

        $query = "INSERT INTO murid (no_kad_pengenalan,name,age,warganegara,bangsa,tarikh_lahir,no_sijil_lahir,tempat_lahir,jantina,alamat_rumah,saizbaju,penyakit,tinggi,berat,kecacatan,nama_penjaga,alamat_rumah_penjaga,telefon_penjaga,hubungan_penjaga,status_kemasukan_text) 
    VALUES('$ic','$nama','$umur','$warganegara','$bangsa','$datebirth','$nosijillahir','$tempatlahir','$jantina','$alamat','$saizbaju','$penyakit','$tinggi','$berat','$kecacatan','$kecemasannama','$kecemasanalamat','$kecemasantelefon','$kecemasanhubungan','a')";
        $result = mysqli_query($db, $query);
        if (!empty($result)) {
        } else {
            echo ("Error description: " . mysqli_error($db));

        }


        $_SESSION['ic'] = $ic;


        $user_check_query = "SELECT * FROM keluarga WHERE no_kad_pengenalan_murid='$ic'";
        $resulta = mysqli_query($db, $user_check_query);
        $usera = mysqli_fetch_assoc($resulta);
        if ($usera > 1) {
            header('location: borangkemasukan-b2.php');

        } else {
            header('location: borangkemasukan-b1.php');

        }
        exit();
    }
}


if (isset($_POST['borangkemasukan-b1'])) {
    // $_SESSION['idmurid'] =$_POST['studentid'];
    foreach ($_POST as $key => $value) {
        // echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        debug_to_console($key . " : " . $value);
    }

    $tahunlahir = substr($_POST['icA'], 0, 2);
    $bulanlahir = substr($_POST['icA'], 2, 2);
    $harilahir = substr($_POST['icA'], 4, 2);
    if ($tahunlahir >= 30) {
        $tahunlahir += 1900;
    } else {
        $tahunlahir += 2000;
    }

    debug_to_console($tahunlahir);
    debug_to_console($bulanlahir);
    debug_to_console($harilahir);

    $ic = $_SESSION['ic'];

    $datebirth =  date("Y-m-d", strtotime("$tahunlahir-$bulanlahir-$harilahir"));

    $hubunganA = $db->real_escape_string($_POST['hubunganA']);
    $namaA = $db->real_escape_string($_POST['namaA']);
    $icA = $db->real_escape_string($_POST['icA']);
    $tempatlahirA = $db->real_escape_string($_POST['tempatlahirA']);
    $warganegaraA = $db->real_escape_string($_POST['warganegaraA']);
    $bangsaA = $db->real_escape_string($_POST['bangsaA']);
    $pekerjaanA = $db->real_escape_string($_POST['pekerjaanA']);
    $statusA = $db->real_escape_string($_POST['statusA']);
    $pendapatanA = $db->real_escape_string($_POST['pendapatanA']);
    $notelpejabatA = $db->real_escape_string($_POST['notelpejabatA']);
    $namamajikanA = $db->real_escape_string($_POST['namamajikanA']);
    $alamatmajikanA = $db->real_escape_string($_POST['alamatmajikanA']);



    $user_check_query = "SELECT * FROM keluarga WHERE no_kad_pengenalan_murid='$ic'";
    $resulta = mysqli_query($db, $user_check_query);
    $usera = mysqli_num_rows($resulta);
    debug_to_console($usera);

    if ($usera >= 2) {
        header('location: borangkemasukan-b2.php');

    } else {
        $query = "INSERT INTO keluarga  (no_kad_pengenalan_murid,hubungan,kad_pengenalan,nama,tarikh_lahir,tempat_lahir,warganegara,keturunan,pekerjaan,status,pendapatan_sebulan,no_telefon_pejabat,nama_majikan,alamat_majikan) 
    VALUES( '$ic','$hubunganA','$icA','$namaA','$datebirth','$tempatlahirA','$warganegaraA','$bangsaA','$pekerjaanA','$statusA','$pendapatanA','$notelpejabatA','$namamajikanA','$alamatmajikanA')";
        $result = mysqli_query($db, $query);
        if (!empty($result)) {
            
            // echo ("Error description: " . mysqli_error($db));

        } else {

            // echo ("Error description: " . mysqli_error($db));

        }
        $query4="UPDATE murid SET status_kemasukan_text='b1' WHERE no_kad_pengenalan='$ic'";
        echo ("Error description: " . mysqli_error($db));
        $result4 = mysqli_query($db, $query4);
        header('location: borangkemasukan-b1.php');

    }



    // header('location: borangkemasukan-b.php');
    exit();
}


if (isset($_POST['borangkemasukan-b2-tambah'])) {
    // $_SESSION['idmurid'] =$_POST['studentid'];
    foreach ($_POST as $key => $value) {
        // echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        debug_to_console($key . " : " . $value);
    }

    $nama = $db->real_escape_string($_POST['nama']);
    $umur = $db->real_escape_string($_POST['umur']);
    $perhubungan = $db->real_escape_string($_POST['perhubungan']);
    $institusi = $db->real_escape_string($_POST['institusi']);
    $biasiswa = $db->real_escape_string($_POST['biasiswa']);
    $ic = $_SESSION['ic'];

    $query = "INSERT INTO keluarga_tanggungan (no_kad_pengenalan_murid,nama,umur,perhubungan,nama_institusi,nilai_biasiswa) 
    VALUES('$ic','$nama','$umur','$perhubungan','$institusi','$biasiswa')";
    $result = mysqli_query($db, $query);
    if (!empty($result)) {
    } else {
        echo ("Error description: " . mysqli_error($db));

    }
    header('location: borangkemasukan-b2.php');
    exit();
    // header('location: borangkemasukan-b.php');
    // exit();
}


if (isset($_POST['borangkemasukan-c'])) {
    // $_SESSION['idmurid'] =$_POST['studentid'];

    // debug_to_console("asasas");

    foreach ($_POST as $key => $value) {
        debug_to_console($key . " : " . $value);
    }

    if (!is_dir("assets/murid/" . $_SESSION["ic"] . "/")) {
        mkdir("assets/murid/" . $_SESSION["ic"] . "/");
    }
    $ic = $_SESSION['ic'];

    debug_to_console($_FILES["bahagianc"]["tmp_name"]);
    debug_to_console($_FILES["bahagianc"]["name"]);
    move_uploaded_file($_FILES["bahagianc"]["tmp_name"], "assets/murid/" . $_SESSION["ic"] . "/" . $_FILES["bahagianc"]["name"]);
    $filename = $_FILES["bahagianc"]["name"];

    $query = "UPDATE keluarga SET file_pengesahan='$filename' WHERE no_kad_pengenalan_murid='$ic'";
    $result = mysqli_query($db, $query);

    // echo "Stored in: " . "assets/murid/". $_SESSION["ic"] ."/". $_FILES["bahagianc"]["name"];

    header('location: borangkemasukan-d.php');
    exit();
}





if (isset($_POST['borangkemasukan-d'])) {
    // $_SESSION['idmurid'] =$_POST['studentid'];

    // debug_to_console("asasas");

    foreach ($_POST as $key => $value) {
        debug_to_console($key . " : " . $value);
    }

    if (!is_dir("assets/murid/" . $_SESSION["ic"] . "/")) {
        mkdir("assets/murid/" . $_SESSION["ic"] . "/");
    }
    $ic = $_SESSION['ic'];

    // debug_to_console($_FILES["bahagianc"]["tmp_name"]);
    // debug_to_console($_FILES["bahagianc"]["name"]);
    move_uploaded_file($_FILES["gambarpassport"]["tmp_name"], "assets/murid/" . $_SESSION["ic"] . "/" . "gambarpassport.jpg");
    $filename1 = $_FILES["gambarpassport"]["name"];

    move_uploaded_file($_FILES["mykid"]["tmp_name"], "assets/murid/" . $_SESSION["ic"] . "/" . "mykid.pdf");
    $filename2 = $_FILES["mykid"]["name"];

    move_uploaded_file($_FILES["sijillahir"]["tmp_name"], "assets/murid/" . $_SESSION["ic"] . "/" . "sijillahir.pdf");
    $filename3 = $_FILES["sijillahir"]["name"];

    move_uploaded_file($_FILES["slipgaji"]["tmp_name"], "assets/murid/" . $_SESSION["ic"] . "/" . "slipgaji.pdf");
    $filename4 = $_FILES["slipgaji"]["name"];

    move_uploaded_file($_FILES["kesihatan"]["tmp_name"], "assets/murid/" . $_SESSION["ic"] . "/" . "kesihatan.pdf");
    $filename5 = $_FILES["kesihatan"]["name"];


    // $query = "UPDATE keluarga SET file_pengesahan='$filename' WHERE no_kad_pengenalan_murid='$ic'";
    // $result = mysqli_query($db, $query);

    // echo "Stored in: " . "assets/murid/". $_SESSION["ic"] ."/". $_FILES["bahagianc"]["name"];

    // header('location: borangkemasukan-menunggu.php');
    // exit();
}

?>