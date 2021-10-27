<?php
include '../function.php';

if  ( isset($_POST["login"])) {


    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");


    //cek email nya

    if( mysqli_num_rows($result) === 1 ){
        $row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			header("Location: index.php");
			exit;
    }

}
}
?>