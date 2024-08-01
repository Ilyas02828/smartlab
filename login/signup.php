<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../assets/images/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style type="text/css">
	.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}

</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100" style="background: lightseagreen;">

		<form class="login100-form validate-form" id="loginform" method="POST" action="signup.php" style="font-family: fangsong !important;">	
					<span class="login100-form-title">
						Create a new Account
					</span>
<?php include('errors.php'); ?>
<br>
		<!-- Username Input Box -->
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: Select">
						<select class="input100" name="type">
							<option >Select Type</option>
							<option value="1">ADMIN</option>
							<option value="2">USER</option>
						</select>

					
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

						<!-- Username Input Box -->
					<div class="wrap-input100 validate-input" data-validate = "User Name required: XYZ">
						<input class="input100" type="text" id="username" name="username" placeholder="Username">
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>

		<!-- Email Input Box -->
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" id="mail" name="email" placeholder="Email">
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

		<!-- Password input Box -->
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password"  id="pass1" name="password" placeholder="Password">
						<span toggle="#pass1" class="fa fa-fw fa-eye text-muted field-icon toggle-password" style="float: right;  margin-right: 15px;  margin-top: -32px;  position: relative;  z-index: 2;"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
		<!-- Confirm Password input Box -->
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password"  id="pass2" name="confirmpassword" placeholder="Confirm Password">
						<span toggle="#pass2" class="fa fa-fw fa-eye text-muted field-icon toggle-password" style="float: right;  margin-right: 15px;  margin-top: -32px;  position: relative;  z-index: 2;"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

		<!-- Submit Button -->
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style="background:brown" type="submit" name="reg_user" id="submit">
							Submit
						</button>
					</div>

			<!-- forget -->
				
			<!-- Create Account -->
					<div class="text-center p-t-80">
						<a class="txt2" href="login.php">
							Already Have Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>	
		</form>
				<div class="login100-pic js-tilt" data-tilt>
					<!-- <img src="../assets/images/img-01.png" alt="IMG"> -->
										<img style="animation: bounce 1.7s infinite;" src="../assets/images/img-01.png" alt="IMG">

				</div>

			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
<!--===============================================================================================-->
<!--===============================================================================================-->
<!-- Password Visibility -->
<script type="text/javascript">
$(".toggle-password").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});
</script>



<!--===============================================================================================-->
<!--===============================================================================================-->



</body>
</html>