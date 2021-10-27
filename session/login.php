<?php
include '../function.php';

	if(ISSET($_POST['login'])){
		$email = $_POST['email'];
		$password = $_POST['password'];
 
		$query = mysqli_query($conn, "SELECT * FROM `user` WHERE `email`='$email' && `password`='$password'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		$count=mysqli_num_rows($query);
 
		if($count == 1){
			$_SESSION['id_user']=$fetch['id_user'];
			header('location: ../index.php');
		}else{
			header('Location: index.php');
		}
	}
?>