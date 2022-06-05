<?php
	session_start();	
	if(!isset($_SESSION['unique_id'])){
		header('location:login.php');
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
		<section class="chat-area">
			<header>
				<?php
					include_once "php/config.php";
					$user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
					$sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
					if(mysqli_num_rows($sql) > 0){
						$row = mysqli_fetch_assoc($sql);
					}
				?>
				<a href="users.php" class="back-icon"><i class="fa fa-arrow-left"></i></a>
				<img src="php/images/<?php echo $row['img'] ?>" alt="" />
				<div class="details">
					<span><?php echo $row['fname']." ".$row['lname'] ?></span>
					<p><?php echo $row['status']?></p>
				</div>
			</header>
			<div class="chat-box">
				
			</div>
			<form action="#" class="typing-area" autocomplete="off">
				<input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden />
				<input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden />
				<input type="text" name="message" class="input-field" placeholder="Type a message here..." />
				<button><i class="fa fa-paper-plane"></i></button>
			</form>
		</section>
	</div>
	
	<script src="js/chat.js"></script>
</body>
</html>