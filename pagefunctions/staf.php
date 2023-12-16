<?php
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

    if (count($errors) == 0) {
        $password = md5($id); //encrypt the password before saving in the database

        $query = "INSERT INTO staf (idpengguna, katalaluan) 
                          VALUES('$id', '$password')";
        mysqli_query($db, $query);

        $query = "INSERT INTO staf_profile (idpengguna, nama,umur) 
                          VALUES('$id', '$nama','$umur')";
        mysqli_query($db, $query);
        header("location: senaraistaf.php");
        exit();

    }

}
if (isset($_POST['deletestaf'])) {
    $idstaf = $_POST["idstaf"];

    $query = "DELETE FROM staf WHERE id='$idstaf'";
    mysqli_query($db, $query);
    header("location: senaraistaf.php");
    exit();

}
if (isset($_POST['editprofilstaf'])) {


    $username = $_SESSION['username'];
    $umur = $_POST['umur'];
    $nama = $_POST['nama'];


    // $gambar = $_POST['gambar'];


    if (!is_dir("assets/img/staf/" . $username . "/")) {
        mkdir("assets/img/staf/" . $username . "/");
    }
    // $ic = $_SESSION['ic'];

    // debug_to_console($_FILES["bahagianc"]["tmp_name"]);
    // debug_to_console($_FILES["bahagianc"]["name"]);
    $gambar = '';

    if (($_FILES["uploadpic"]["name"] != "")) {

        $file_ext = substr($_FILES["uploadpic"]["name"], strripos($_FILES["uploadpic"]["name"], '.'));

        // debug_to_console($_POST["uploadpic"]);

        move_uploaded_file($_FILES["uploadpic"]["tmp_name"], "assets/img/staf/" . $username . "/" . "gambar" . $file_ext);
        $gambar = "gambar" . $file_ext;

    }


    $query = "UPDATE staf_profile
    SET umur='$umur', nama='$nama', gambar='$gambar' 
    WHERE idpengguna='$username' ";
    mysqli_query($db, $query);


}


if (isset($_POST['kemasukan-layak'])) {
    $ic = $_POST['ic'];
    $query = "UPDATE murid SET status_kemasukan='1' WHERE no_kad_pengenalan='$ic'";
    $result = mysqli_query($db, $query);
    header('location: senaraikemasukan.php');
    exit();



}
if (isset($_POST['kemasukan-tidaklayak'])) {
    $ic = $_POST['ic'];

    $query = "UPDATE murid SET status_kemasukan='2' WHERE no_kad_pengenalan='$ic'";
    $result = mysqli_query($db, $query);
    header('location: senaraikemasukan.php');
    exit();
}

?>