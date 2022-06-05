<?php 
	session_start();
	include_once "config.php";
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
		//let's check user email is valid or not
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){//if email valid
			//let's check that email already exist in the database or not
			$sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
			if(mysqli_num_rows($sql) > 0){//if email already exist
				echo "$email - This email already exist!";
			}else{
				//let's check user upload file or not 
				if(isset($_FILES['image'])){//if file is uploaded
					$img_name = $_FILES['image']['name'];//getting user uploaded image name
					$img_type = $_FILES['image']['type'];//getting user uploaded image type
					$tmp_name = $_FILES['image']['tmp_name'];//this temporary name is user to save/move file in our folder
					
					//let's explode image and get the last jpg png
					$img_explode = explode('.',$img_name);
					$img_ext = end($img_explode);//here we get extension of an user uploade img file
					
					$extensions = ['png','jpeg','jpg'];//these are some valid img ext is and we've store them in array
					if(in_array($img_ext, $extensions) === true){//if user uploade img ext is matched any array extensions
						$time = time();//this will return us current time
						
						//let's move the user uploade img to uor partcular folder
						$new_img_name = $time.$img_name;
						
						if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
							$status = "Active now";//once user signed up then his status will be active now
							$random_id = rand(time(), 10000000);//creating random id for user
							
							//let's insert all user data inside table
							$sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status) VALUE({$random_id}, '{$fname}','{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}' )");
							if($sql2){
							$sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
								if(mysqli_num_rows($sql3) > 0){
									$row = mysqli_fetch_assoc($sql3);
									$_SESSION['unique_id'] = $row['unique_id'];//using this session we used unique_id in other php file 
									echo "success";
								}
							}else{
								echo "Somthing went wrong!";
							}
						}
					}else{
						echo "Please select an image file - jpg, png, jpeg!";
					}
				}else{
					echo "Please select an image file!";
				}
			}
		}else{
			echo "$email - this is not a valid email";
		}
	}else{
		echo "All input field are requird!";
	}
	
	
?>