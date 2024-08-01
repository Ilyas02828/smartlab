<?php
session_start();

	// variable declaration
	$username = "";
	$email    = "";
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	$db = mysqli_connect('localhost', 'root', '', 'drenderv_laboratory');

	// REGISTER USER
	if (isset($_POST['reg_user'])) {
		// receive all input values from the form
		$type =  $_POST['type'];
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password']);
		$password_2 = mysqli_real_escape_string($db, $_POST['confirmpassword']);

		if ($password_1 != $password_2) {
			array_push($errors, " Passwords do not match");
		}

		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database
			$query = "INSERT INTO `user` (`username`, `email`, `password`, `status`) 
					               VALUES('$username','$email','$password' ,'$type')";
			mysqli_query($db, $query);
			header('location:../laboratory/index.php');
		}

	}

	// ... 

	// LOGIN USER
	if (isset($_POST['login_user'])) {
	    
	       function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
	   // print_r(validate($_POST['password'])); exit();

		$email = validate($_POST['email']);
		$password = validate($_POST['password']);

		if (empty($email)) {
			array_push($errors, "Email is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
			$results = mysqli_query($db, $query);

$row=(mysqli_fetch_array($results));
$usernamex=$row['username'];
$status=$row['status']; 
$mail=$row['email']; 



			if (!$results || mysqli_num_rows($results) == 1) {

if (!isset($_SESSION)) {
ob_start();
session_start();
}
				 $_SESSION['username'] = $usernamex;
				 $_SESSION['status'] = $status;
				 $_SESSION['email'] = $mail;

				$_SESSION['success'] = "logged"; ?>
				<script> location.replace("../laboratory/index.php"); </script> 
				<!--header('location: ../laboratory/index.php');-->
				
		<?php	}else {
				array_push($errors, "Wrong Username/Password ");
			}
		}
	}




	
if (isset($_GET['logout'])) {
      unset($_SESSION['username']);
        unset($_SESSION['status']);
        header("Location: ../login/login.php");
        die();
    }
	
?>


