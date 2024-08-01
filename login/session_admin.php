<?php
if (!isset($_SESSION)) {
  ob_start();
  session_start();
}
if (empty($_SESSION['username'])) {

    // print_r("back to login");
     header("Location: ../login/login.php");
    //  exit();
}

// if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
// if ((!isset($_SESSION['username'])) AND (!isset($_SESSION['status']))) {
    // header('Location: ../login/login.php');
    // }

 if (isset($_SESSION['status']) != 1) {
  if ( isset($_SESSION['status']) !=2 ) {
      header('Location: ../login/login.php');
     }
}

// else{
    
//           header('Location: index.php');

// }




if (isset($_GET['logout'])) {
      unset($_SESSION['username']);
        unset($_SESSION['status']);
        header("Location: login/login.php");
        die();
    }

?>

