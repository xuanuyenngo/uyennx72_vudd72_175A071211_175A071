<?php 
	if (isset($_POST['input_log_Email']) and isset($_POST['input_log_Pass'])) {
		$email = $_POST['input_log_Email'];
		$pass = $_POST['input_log_Pass'];	

		$conn = mysqli_connect('localhost','root','','dbposts');
		mysqli_set_charset($conn, 'UTF8');
		if (!$conn) {
			die("ERROR".mysqli_connect_error());
		}else{
			$sql = "select * from users where email='".$email."'";
			$result = mysqli_query($conn, $sql);
			if(mysqli_num_rows($result)>0){
				$row = mysqli_fetch_assoc($result);
				if (password_verify($pass, $row['pass'])) {
					session_start();
					$_SESSION['iduser'] = $row['iduser'];
					$_SESSION['username'] = $row['username'];
					// header("Location: http://dreamcode20.000webhostapp.com/admin/home.php");
					header("Location: home.php");
					// exit();

				}
				else{
					header("Location: index.php");
				}
			}
		}
	}
	
 ?>