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
		<section class="form signup">
			<header>VS Chat App</header>
				<form action="#" enctype="multipart/form-data">
					<div class="error-text"></div>
					<div class="name-details">
						<div class="field input">
							<label>First Name</label>
							<input type="text" name="fname" placeholder="First Name" required>
						</div>
						<div class="field input">
							<label>Last Name</label>
							<input type="text" name="lname" placeholder="Last Name" required>
						</div>
					</div>	
					<div class="field input">
						<label>Email Address</label>
						<input type="text" name="email" placeholder="Enter your email" required>
					</div>
					<div class="field input">
						<label>Password</label>
						<input type="password" name="password" placeholder="Enter new password" required>
						<i class="fa fa-eye"></i>
					</div>
					<div class="field image">
						<label>Select image</label>
						<input type="file" name="image" required>
					</div>
					<div class="field button">
						<input type="submit" value="Continue to chat" >
					</div>				
				</form>
				<div class="link">Already signed up?<a href="login.php">Login now</a></div>
		</section>
	</div>
	
	<script src="js/pass-show-hide.js"></script>
	<script src="js/signup.js"></script>
	
</body>
</html>