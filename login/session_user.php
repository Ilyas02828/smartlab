<?php 
    session_start(); 
$admin=1;
$user=2;

// $_SESSION['status'] !=$admin OR 
if (!isset($_SESSION['username']) AND !isset($_SESSION['status'])) {
        // $_SESSION['success'] = "You must log in first";
        header('location: ../login/login.php');
    }


if ($_SESSION['status'] != $user) {
	
if ( $_SESSION['status'] !=$admin ) {
     header('location: ../login/login.php');
}

}

if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['username']);
        unset($_SESSION['status']);
        header("location: ../login/login.php");
    }

?>