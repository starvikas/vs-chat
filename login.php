<?php
	session_start();
	if(isset($_SESSION['unique_id'])){//if user is logged in
		header("location: users.php");
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VS Chat App</title>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="wrapper">
		<section class="form login">
			<header>VS Chat App</header>
				<form action="#">
					<div class="error-text"></div>
						
					<div class="field input">
						<label>Email Address</label>
						<input type="text" name="email" placeholder="Enter your email"/>
					</div>
					<div class="field input">
						<label>Password</label>
						<input type="password" name="password" placeholder="Enter your password"/>
						<i class="fa fa-eye"></i>
					</div>
					<div class="field button">
						<input type="submit" value="Continue to chat">
					</div>				
				</form>
				<div class="link">Not yet signed up?<a href="index.php">Signup now</a></div>
		</section>
	</div>
	
	<script src="js/pass-show-hide.js"></script>
	<script src="js/login.js"></script>
	
</body>
</html>