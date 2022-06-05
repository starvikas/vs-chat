<?php
	session_start();
	
	if(!isset($_SESSION['unique_id'])){
		header('Location:login.php');
	}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title></title>
	<link rel="stylesheet" href="main.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="wrapper">
		<section class="users">
			<header>
			<?php
				include_once "php/config.php";
				$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
				if(mysqli_num_rows($sql) > 0){
					$row = mysqli_fetch_assoc($sql);
				}
			?>
				<div class="content">
					<img src="php/images/<?php echo $row['img'] ?>" alt="" />
					<div class="details">
						<span><?php echo $row['fname']." ".$row['lname'] ?></span>
						<p style="color:#00A36C"><?php echo $row['status']?></p>
					</div>
				</div>
				<a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
			</header>
			<div class="search">
				<span class="text">Select an user to start chat</span>
				<input type="text" placeholder="Enter Name to search..." />
				<button><i class="fa fa-search"></i></button>
			</div>
			<div class="users-list">
				
			</div>
		</section>
	</div>
	
	<script src="js/users.js"></script>
	
</body>
</html>