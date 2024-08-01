<?php include('server.php');

        ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
<body style="font-family: fangsong;">
	
	<div class="limiter" style="font-family: fangsong !important;">
		<div class="container-login100" style="background: ;">
			<div class="wrap-login100" style="background: lightseagreen; font-family: fangsong;">
				<div class="login100-pic js-tilt" data-tilt>
					<img style="animation: bounce 2.0s infinite;" src="../assets/images/img-01.png" alt="IMG">
				</div>


				<form class="login100-form validate-form" method="POST" id="loginform" action="login.php">
					
					<span class="login100-form-title">
						WELCOME TO SMART LABORATORY  
					</span>
<?php include('errors.php'); ?>
<br>
		<!-- Email Input Box -->
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" value="ilyas02828@gmail.com" id="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

		<!-- Password input Box -->
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
					   <input class="input100" type="password" value="123"  id="password" name="password" placeholder="Password">
					   <span toggle="#password" class="fa fa-fw fa-eye text-muted field-icon toggle-password" style="float: right;  margin-right: 15px;  margin-top: -32px;  position: relative;  z-index: 2;"></span>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
		<!-- Submit Button -->
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" style="background:brown" type="submit" name="login_user" id="submit">
							Log in
						</button>
					</div>

			<!-- forget -->
			<!-- 		<div class="text-center p-t-12">
						<span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="#">
							Username / Password?
						</a>
					</div>
 -->
			<!-- Create Account -->
				<!-- 	<div class="text-center p-t-136">
						<a class="txt2" href="signup.php">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div> -->


				</form>
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