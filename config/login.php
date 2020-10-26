<?php
require 'includes/form_handlers/login_handler.php';
?>
session_start();
$con = mysqli_connect("localhost", "root", "", "social");
if (mysqli_connect_errno()) {
  echo "Failed to connect :" . mysqli_connect_errno();
}
$query = mysqli_query($con,"INSERT INTO test VALUES ('2','Optimus Prime')");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="login.css">
</head>
<body>
	<section>
		<div class="box">
			<div class="form">
				<h2>Login</h2>
				<form action="register.php" method="POST">
					<div class="input">
						<input type="email" name="log_email" placeholder="Email Addrress">
						<img src="user.png">
					</div>
					<div class="input">
						<input type="password" name="log_password" placeholder="Password">
						<img src="lock.png">
					</div>
					<label class="remember">
						<input type="checkbox">Remember Me
					</label>
					<div class="input">
						<input type="submit" placeholder="login">
						
					</div>
				</form>
				<p>Forgot Password</p>
				<p>Not a user! Register</p>
			</div>
		</div>
	</section>
</body>
</html>
