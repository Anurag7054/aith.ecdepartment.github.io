<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

	<link rel="stylesheet" href="CSS/sign.css">
	<link rel="stylesheet" href="CSS/Mycss.css" />

	<title>Electronics Department AITH Kanpur</title>
</head>

<body>
	<?php
	include('header/header.php');
	?>


	<!-- Contect Us Start -->

	<section id="login">

		<div class="container h-100">
			<div class="d-flex justify-content-center h-100">
				<div class="user_card">
					<div class="d-flex justify-content-center">
						<div class="brand_logo_container">
							<img src="Img/logo AITH.jpg" class="brand_logo" alt="Logo">
						</div>
					</div>
					<div class="d-flex justify-content-center form_container">
						<form role="form" method="post" action="#">
							<div class="input-group mb-3">
								<!-- <div class="input-group-append">
								<span class="input-group-text"><i class="fa fa-user"></i></span>
							</div> -->
								<input type="mail" name="email" class="form-control input_user" value="" placeholder="username">
							</div>
							<div class="input-group mb-2">

								<input type="password" name="password" class="form-control input_pass" value="" placeholder="password">
							</div>
							<div class="form-group">
								<!-- remember me start -->
								<div class="custom-control custom-checkbox">
									<input type="checkbox" class="custom-control-input" id="customControlInline">
									<label class="custom-control-label" for="customControlInline">Remember me</label>
								</div>
								<!-- remember me end -->
							</div>
							<div class="d-flex justify-content-center mt-3 login_container">
								<button type="submit" class="btn btn-primary" value="SUBMIT" name="faculty">Faculty</button>
							</div>
							<div class="d-flex justify-content-center mt-3 login_container">
								<button type="submit" class="btn btn-primary" value="SUBMIT" name="student">Student</button>
							</div>
						</form>
					</div>

					<div class="mt-4">
						<div class="d-flex justify-content-center links">
							Don't have an account? <a href="login.php" class="ml-2">Sign Up</a>
						</div>
						<div class="d-flex justify-content-center links">
							<a href="forgotpass.php">Forgot your password?</a>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>

	<!-- Contect Us End  -->
	<!-- Our Pricing End-->

	<?php
	include('footer/footer.php');
	?>
	<!-- JavaScript Files Start -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Jquery Script start-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js" integrity="sha512-+/4Q+xH9jXbMNJzNt2eMrYv/Zs2rzr4Bu2thfvzlshZBvH1g+VGP55W8b6xfku0c0KknE7qlbBPhDPrHFbgK4g==" crossorigin="anonymous"></script>
	<!-- Jquery Script end-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- JavaScript Files End -->

</body>

</html>


<?php
include("database/dbconn.php");
if (isset($_POST['student'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$check_user = "select * from studentlogin where email='$email'";
	$que2 = mysqli_query($conn, $check_user);
	while ($row = mysqli_fetch_array($que2)) {
		$user_pass = $row[2];
?>
	<?php }
	$check_pass = password_verify($password, $user_pass);

	if ($check_pass) {
		$_SESSION['user'] = $email; //here session is used and value of $user_email store in $_SESSION.
		echo "<script>window.open('studentprofile.php','_self')</script>";
	} else {
		echo "<script>alert('Email or password is incorrect!')</script>";
	}
}

// Student Login Code End 


// Faculty Login Code Start

if (isset($_POST['faculty'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];

	$check_user = "select * from facultylogin where email='$email'";
	$que2 = mysqli_query($conn, $check_user);
	while ($row = mysqli_fetch_array($que2)) {
		$user_pass = $row[2];
	?>
<?php }
	$check_pass = password_verify($password, $user_pass);

	if ($check_pass) {
		$_SESSION['user'] = $email; //here session is used and value of $user_email store in $_SESSION.
		echo "<script>window.open('facultyprofile.php','_self')</script>";
	} else {
		echo "<script>alert('Email or password is incorrect!')</script>";
	}
}
// Faculty Login Code End

?>