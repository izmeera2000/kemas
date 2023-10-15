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


?>