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




    $password = md5($password);
    $query = "SELECT * FROM staf WHERE idpengguna='$username' AND katalaluan='$password'";
    $results = mysqli_query($db, $query);

    if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $username;

        while ($row = mysqli_fetch_assoc($results)) {

            $_SESSION['level'] = $row['level'];
        }
        // $_SESSION['success'] = "You are now logged in";
        if ($password != md5($username)) {
            header('location: index.php');
        } else {

            header('location: tukarkatalaluan.php');

        }

    } else {
        array_push($errors, "Wrong username/password combination");
    }

}

if (isset($_POST['tambahstaf'])) {

    $id = mysqli_real_escape_string($db, $_POST['id']);
    $level = mysqli_real_escape_string($db, $_POST['level']);
    $nama = mysqli_real_escape_string($db, $_POST['nama']);
    $umur = mysqli_real_escape_string($db, $_POST['umur']);


    $user_check_query = "SELECT * FROM staf WHERE idpengguna='$id'  LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $row = mysqli_fetch_assoc($result);

    if ($row) { // if user exists
        if ($row['idpengguna'] === $id) {
            array_push($errors, "ID Pengguna wujud");
        }
    }
    echo count($errors);
    echo "thisds";
    if (count($errors) == 0) {
        $password = md5($id); //encrypt the password before saving in the database

        $query = "INSERT INTO staf (idpengguna, katalaluan) 
                          VALUES('$id', '$password')";
        mysqli_query($db, $query);

        $query = "INSERT INTO staf_profile (idpengguna, nama,umur) 
                          VALUES('$id', '$nama','$umur')";
        mysqli_query($db, $query);


    }

}
if (isset($_POST['tukarkatalaluan'])) {

    $password_1 = mysqli_real_escape_string($db, $_POST['password1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password2']);
    $id = mysqli_real_escape_string($db, $_POST['id']);

    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $query = "UPDATE staf  
                      SET katalaluan='$password'
                      WHERE idpengguna='$id';";
        mysqli_query($db, $query);

        header('location: index.php');
    }
}

if (isset($_POST['login_ibubapa'])) {

    $ic = mysqli_real_escape_string($db, $_POST['ic']);

    $query = "SELECT * FROM murid WHERE no_kad_pengenalan='$ic' ";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        $_SESSION['username'] = $ic;
        while ($row = mysqli_fetch_assoc($results)) {

            if ($row['status_kemasukan'] != 1) {
                if ($row['status_kemasukan_text'] == "d") {
                    header('location: borangkemasukan-d.php');
                }
            } else {
                $_SESSION['level'] = 0;
                $_SESSION['idmurid'] = $row['id'];
                header('location: profilmurid.php');

            }
        }
    } else {
        array_push($errors, "Wrong username/password combination");
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: lamanutama.php");
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
if (isset($_POST['pemarkahan'])) {
    $_SESSION['idmurid'] = $_POST['studentid'];
    header('location: pemarkahan.php');

}

if (isset($_POST['tambahpemarkahan'])) {
    // $_SESSION['idmurid'] = $_POST['studentid'];
    // header('location: pemarkahan.php');
    foreach ($_POST as $key => $value) {
        // echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        debug_to_console($key . " : " . $value);
    }
    $ic = $_POST['murid_id'];
    // $tarikh = $_POST['tarikh'];

    $bm1 = $_POST['bm1'];
    $bm2 = $_POST['bm2'];
    $bm3 = $_POST['bm3'];
    $bi1 = $_POST['bi1'];
    $bi2 = $_POST['bi2'];
    $bi3 = $_POST['bi3'];
    $pi1 = $_POST['pi1'];
    $pi2 = $_POST['pi2'];
    $pi3 = $_POST['pi3'];
    $pi4 = $_POST['pi4'];
    $pi5 = $_POST['pi5'];
    $pi6 = $_POST['pi6'];
    $keterampilan = $_POST['keterampilan'];
    $perkem1 = $_POST['perkem1'];
    $perkem2 = $_POST['perkem2'];
    $perkem3 = $_POST['perkem3'];
    $perkem4 = $_POST['perkem4'];
    $perkem5 = $_POST['perkem5'];
    $perkem6 = $_POST['perkem6'];
    $kreativ1 = $_POST['kreativ1'];
    $kreativ2 = $_POST['kreativ2'];
    $sainsawal1 = $_POST['sainsawal1'];
    $sainsawal2 = $_POST['sainsawal2'];
    $matematikawal1 = $_POST['matematikawal1'];
    $matematikawal2 = $_POST['matematikawal2'];
    $matematikawal3 = $_POST['matematikawal3'];
    $matematikawal4 = $_POST['matematikawal4'];
    $matematikawal5 = $_POST['matematikawal5'];
    $matematikawal6 = $_POST['matematikawal6'];
    $kemanusiaan = $_POST['kemanusiaan'];
    $catatan = $_POST['catatan'];

    $namastaf = $_SESSION['username'];

    $query = "SELECT * FROM staf_profile WHERE idpengguna='$namastaf' ";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
        while ($row = mysqli_fetch_assoc($results)) {

            $namastaf = $row['nama'];

        }
    }
    $query = "INSERT INTO pemarkahan  (murid_id,idpengguna,bm1,bm2,bm3,bi1,bi2,bi3,pi1,pi2,pi3,pi4,pi5,pi6,keterampilan,perkem1,perkem2,perkem3,perkem4,perkem5,perkem6,kreativ1,kreativ2,sainsawal1,sainsawal2,matematikawal1,matematikawal2,matematikawal3,matematikawal4,matematikawal5,matematikawal6,kemanusiaan,catatan)
    VALUES('$ic','$namastaf', '$bm1','$bm2','$bm3','$bi1','$bi2','$bi3','$pi1','$pi2','$pi3','$pi4','$pi5','$pi6','$keterampilan','$perkem1','$perkem2','$perkem3','$perkem4','$perkem5','$perkem6','$kreativ1','$kreativ2','$sainsawal1','$sainsawal2','$matematikawal1','$matematikawal2','$matematikawal3','$matematikawal4','$matematikawal5','$matematikawal6','$kemanusiaan','$catatan')";
    $result = mysqli_query($db, $query);
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


    $datebirth = date("Y-m-d", strtotime("$tahunlahir-$bulanlahir-$harilahir"));


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
            exit();

        } else {
            header('location: borangkemasukan-b1.php');
            exit();

        }
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

    $datebirth = date("Y-m-d", strtotime("$tahunlahir-$bulanlahir-$harilahir"));

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
        $query4 = "UPDATE murid SET status_kemasukan_text='b1' WHERE no_kad_pengenalan='$ic'";
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
    move_uploaded_file($_FILES["bahagianc"]["tmp_name"], "assets/murid/" . $ic . "/" . "bahagianc.pdf");
    $filename = "bahagianc.pdf";

    move_uploaded_file($_FILES["slipgaji"]["tmp_name"], "assets/murid/" . $ic . "/" . "slipgaji.pdf");
    $filename4 = "slipgaji.pdf";

    $query = "UPDATE keluarga SET file_pengesahan='$filename' , file_slipgaji='$filename4' WHERE no_kad_pengenalan_murid='$ic'";
    $result = mysqli_query($db, $query);
    $query = "UPDATE murid SET status_kemasukan_text='c' WHERE no_kad_pengenalan='$ic'";
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

    if (isset($_POST['a'])) {
        $geran = 1;
    } else {
        $geran = 0;

    }
    // debug_to_console($_FILES["bahagianc"]["tmp_name"]);
    // debug_to_console($_FILES["bahagianc"]["name"]);
    $file_ext = substr($_FILES["gambarpassport"]["name"], strripos($_FILES["gambarpassport"]["name"], '.'));
    move_uploaded_file($_FILES["gambarpassport"]["tmp_name"], "assets/murid/" . $ic . "/" . "gambar" . $file_ext);
    $filename1 = "gambar" . $file_ext;

    move_uploaded_file($_FILES["mykid"]["tmp_name"], "assets/murid/" . $ic . "/" . "mykid.pdf");
    $filename2 = "mykid.pdf";

    move_uploaded_file($_FILES["sijillahir"]["tmp_name"], "assets/murid/" . $ic . "/" . "sijillahir.pdf");
    $filename3 = "sijillahir.pdf";



    move_uploaded_file($_FILES["kesihatan"]["tmp_name"], "assets/murid/" . $ic . "/" . "kesihatan.pdf");
    $filename5 = "kesihatan.pdf";


    $query = "UPDATE murid SET gambar='$filename1', file_mykid='mykid.pdf', file_sijil='sijillahir.pdf' , file_rekod_kesihatan='kesihatan.pdf',geran='$geran', status_kemasukan='0' WHERE no_kad_pengenalan='$ic'";
    $result = mysqli_query($db, $query);

    $query = "UPDATE murid SET status_kemasukan_text='d' WHERE no_kad_pengenalan='$ic'";
    $result = mysqli_query($db, $query);

    // echo "Stored in: " . "assets/murid/". $_SESSION["ic"] ."/". $_FILES["bahagianc"]["name"];

    header('location: borangkemasukan-menunggu.php');
    exit();
}


if (isset($_POST['kemasukan-layak'])) {
    $ic = $_POST['ic'];
    $query = "UPDATE murid SET status_kemasukan='1' WHERE no_kad_pengenalan='$ic'";
    $result = mysqli_query($db, $query);


}
if (isset($_POST['kemasukan-tidaklayak'])) {
    $ic = $_POST['ic'];

    $query = "UPDATE murid SET status_kemasukan='0' WHERE no_kad_pengenalan='$ic'";
    $result = mysqli_query($db, $query);
}

if (isset($_POST['tahunpemarkahan'])) {
    if (isset($_POST['tahun'])) {
        $_SESSION['tahundipilih'] = $_POST['tahun'];
    }

}

if (isset($_POST['download-pdf'])) {
    require('assets/vendor/fpdf/fpdf.php');

    require('assets/vendor/fpdf/exfpdf.php');
    require('assets/vendor/fpdf/easyTable.php');

    class exPDF extends FPDF
    {

    }





    // Instanciation of inherited class
    $pdf = new exFPDF('P', 'mm', 'A4');
    $pdf->Footer();

    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 10);
    // for($i=1;$i<=40;$i++)
    $tableb = new easyTable($pdf, '%{100}', 'border:0;font-size:10;');

    $tableb->easyCell('Laporan Pemarkahan', 'valign:M;  align:C');
    $tableb->printRow();
    $tableb->endTable();

    $pdf->SetTextColor(0);
    $pdf->SetFont('Arial', '', 10);


    $tablea = new easyTable($pdf, '%{20, 20, 60}', 'border:1;font-size:10;');
    $id = $_POST['id'];
    $tarikh = $_POST['tahun'];
    $query = "SELECT * FROM murid WHERE id='$id'  LIMIT 1 ";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($result)) {


        $tablea->easyCell('Nama', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['name'], 'valign:M;, 255;align:L');
        $tablea->printRow();
        $tablea->easyCell('No. MyKid', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['no_kad_pengenalan'], 'valign:M;, 255;align:L');
        $tablea->printRow();

        $tablea->easyCell('Jantina', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['jantina'], 'valign:M;, 255;align:L');
        $tablea->printRow();
        $tablea->easyCell('Umur', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['age'], 'valign:M;, 255;align:L');
        $tablea->printRow();
        // $tablea->easyCell('Kelas', 'valign:M; bgcolor:#d9d8d4;  align:L');
        // $tablea->easyCell('Nama', 'valign:M;, 255;align:L');
        // $tablea->printRow();
    }


    $query = "SELECT * FROM pemarkahan WHERE murid_id='$id' AND tarikh LIKE '%$tarikh%' LIMIT 1 ";
    $result = mysqli_query($db, $query);
    while ($row = mysqli_fetch_assoc($result)) {

        $tablea->easyCell('Nama Guru', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['idpengguna'], 'valign:M;, 255;align:L');
        $tablea->printRow();
        $tablea->easyCell('Tarikh Pelaporan', 'valign:M; bgcolor:#d9d8d4;  align:L');
        $tablea->easyCell($row['tarikh'], 'valign:M;, 255;align:L');
        $tablea->printRow();
        $tablea->endTable(10);

        $table = new easyTable($pdf, '%{20, 20, 60}', 'border:1;font-size:12;');

        $table->easyCell('<b>Komponen</b>', 'valign:C; bgcolor:#21506e;font-color:255,255, 255;align:C');
        $table->easyCell('<b>Kemahiran</b>', 'valign:C; bgcolor:#21506e;font-color:255,255, 255;align:C');
        $table->easyCell('<b>Tafsiran</b>', 'valign:C; bgcolor:#21506e;font-color:255,255, 255;align:C');
        $table->printRow(true);

        $table->easyCell('<b>BAHASA MELAYU</b>', 'valign:M;align:C;rowspan:3;');
        $table->easyCell('MENDENGAR DAN BERTUTUR', 'valign:M;align:C');
        $table->easyCell($row['bm1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('MEMBACA', 'valign:M;align:C');
        $table->easyCell($row['bm2'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('MENULIS', 'valign:M;align:C');
        $table->easyCell($row['bm3'], 'valign:M;align:C');
        $table->printRow();

        $table->easyCell('<b>BAHASA INGGERIS</b>', 'valign:M;align:C;rowspan:3;');
        $table->easyCell('LISTENING AND SPEAKING', 'valign:M;align:C');
        $table->easyCell($row['bi1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('READING', 'valign:M;align:C');
        $table->easyCell($row['bi2'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('WRITING', 'valign:M;align:C');
        $table->easyCell($row['bi3'], 'valign:M;align:C');
        $table->printRow();


        $table->easyCell('<b>PENDIDIKAN ISLAM</b>', 'valign:M;align:C;rowspan:6;');
        $table->easyCell('AL-QURAN', 'valign:M;align:C');
        $table->easyCell($row['pi1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('AKIDAH', 'valign:M;align:C');
        $table->easyCell($row['pi2'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('IBADAH', 'valign:M;align:C');
        $table->easyCell($row['pi3'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('SIRAH', 'valign:M;align:C');
        $table->easyCell($row['pi4'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('AKHLAK', 'valign:M;align:C');
        $table->easyCell($row['pi5'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('JAWI', 'valign:M;align:C');
        $table->easyCell($row['pi6'], 'valign:M;align:C');
        $table->printRow();

        $table->easyCell('<b>KETERAMPILAN DIRI</b>', 'valign:M;align:C;rowspan:1;colspan:2');
        $table->easyCell($row['keterampilan'], 'valign:M;align:C');
        $table->printRow();

        $table->easyCell('<b>PERKEMBANGAN FIZIKAL DAN PENJAGAAN KESIHATAN</b>', 'valign:M;align:C;rowspan:6;colspan:1');
        $table->easyCell('PERKEMBANGAN MOTOR HALUS', 'valign:M;align:C');
        $table->easyCell($row['perkem1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('PERKEMBANGAN MOTOR KASAR', 'valign:M;align:C');
        $table->easyCell($row['perkem2'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('MANIPULASI', 'valign:M;align:C');
        $table->easyCell($row['perkem3'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('PERGERAKAN IRAMA', 'valign:M;align:C');
        $table->easyCell($row['perkem4'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('PENDIDIKAN KESIHATAN REPRODUKTIF DAN SOSIAL (PEERS)', 'valign:M;align:C');
        $table->easyCell($row['perkem5'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('PEMAKANAN', 'valign:M;align:C');
        $table->easyCell($row['perkem6'], 'valign:M;align:C');
        $table->printRow();

        $table->easyCell('<b>KREATIVITI DAN ESTETIKA</b>', 'valign:M;align:C;rowspan:2;colspan:1');
        $table->easyCell('MUZIK', 'valign:M;align:C');
        $table->easyCell($row['kreativ1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('SENI VISUAL', 'valign:M;align:C');
        $table->easyCell($row['kreativ2'], 'valign:M;align:C');
        $table->printRow();


        $table->easyCell('<b>SAINS AWAL</b>', 'valign:M;align:C;rowspan:2;colspan:1');
        $table->easyCell('PROSES SAINS', 'valign:M;align:C');
        $table->easyCell($row['sainsawal1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('PENEROKAAN', 'valign:M;align:C');
        $table->easyCell($row['sainsawal2'], 'valign:M;align:C');
        $table->printRow();

        $table->easyCell('<b>MATEMATIK AWAL</b>', 'valign:M;align:C;rowspan:6;colspan:1');
        $table->easyCell('PENGALAMAN PRANOMBOR', 'valign:M;align:C');
        $table->easyCell($row['matematikawal1'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('KONSEP NOMBOR', 'valign:M;align:C');
        $table->easyCell($row['matematikawal2'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('OPERASI NOMBOR', 'valign:M;align:C');
        $table->easyCell($row['matematikawal3'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('NILAI WANG', 'valign:M;align:C');
        $table->easyCell($row['matematikawal4'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('MASA DAN WAKTU', 'valign:M;align:C');
        $table->easyCell($row['matematikawal5'], 'valign:M;align:C');
        $table->printRow();
        $table->easyCell('BENTUK DAN RUANG', 'valign:M;align:C');
        $table->easyCell($row['matematikawal6'], 'valign:M;align:C');
        $table->printRow();


        $table->easyCell('<b>KEMANUSIAAN</b>', 'valign:M;align:C;rowspan:1;colspan:2');
        $table->easyCell($row['kemanusiaan'], 'valign:M;align:C');
        $table->printRow();
        $table->endTable();


        $tablec = new easyTable($pdf, '%{100}', 'border:0;');

        $tablec->easyCell('Catatan', 'valign:B;   align:L;border:0;font-size:10;');
        $tablec->printRow();
        $tablec->easyCell($row['catatan'], 'valign:M;   align:C;border:1;font-size:12;');
        $tablec->printRow();
        $tablec->endTable();

        $pdf->Output();
    }




}


?>