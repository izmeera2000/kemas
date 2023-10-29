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


function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}








if (isset($_POST['profilmurid']))
{
    $_SESSION['idmurid'] =$_POST['studentid'];
    header('location: profilmurid.php');

}

if (isset($_POST['borangkemasukan-a']))
{
    // $_SESSION['idmurid'] =$_POST['studentid'];
    foreach ($_POST as $key => $value) {
        // echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        debug_to_console($key ." : " . $value);
    }

    $tahunlahir = substr($_POST['icA'], 0, 2);
    $bulanlahir = substr($_POST['icA'], 2, 2);
    $harilahir = substr($_POST['icA'], 4, 2);
    if ($tahunlahir >= 30){
        $tahunlahir += 1900;
    }
    else{
        $tahunlahir += 2000;
    }
    
    debug_to_console($tahunlahir);
    debug_to_console($bulanlahir);
    debug_to_console($harilahir);
    // header('location: borangkemasukan-b.php');
    // exit();
}


if (isset($_POST['borangkemasukan-b1']))
{
    // $_SESSION['idmurid'] =$_POST['studentid'];
    foreach ($_POST as $key => $value) {
        // echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        debug_to_console($key ." : " . $value);
    }

    $tahunlahir = substr($_POST['icA'], 0, 2);
    $bulanlahir = substr($_POST['icA'], 2, 2);
    $harilahir = substr($_POST['icA'], 4, 2);
    if ($tahunlahir >= 30){
        $tahunlahir += 1900;
    }
    else{
        $tahunlahir += 2000;
    }
    
    debug_to_console($tahunlahir);
    debug_to_console($bulanlahir);
    debug_to_console($harilahir);

    // header('location: borangkemasukan-b.php');
    // exit();
}


if (isset($_POST['borangkemasukan-b2-tambah']))
{
    // $_SESSION['idmurid'] =$_POST['studentid'];
    foreach ($_POST as $key => $value) {
        // echo "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
        debug_to_console($key ." : " . $value);
    }



    // header('location: borangkemasukan-b.php');
    // exit();
}

?>