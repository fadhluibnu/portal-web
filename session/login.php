<?php
include '../function.php';

if (isset($_POST["login"])) {


    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");


    //cek email nya

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            header("Location: ../");
            exit;
        } else {
            echo "
            <script>
                alert('Gagal Login');
                window.location.href = '../session/';
            </script>";
        }
    }
}


// if(ISSET($_POST['login'])){
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $query = mysqli_query($conn, "SELECT * FROM `user` WHERE `email`='$email' && `password`='$password'") or die(mysqli_error());
//     $fetch=mysqli_fetch_array($query);
//     $count=mysqli_num_rows($query);

//     if($count == 1){
//         $_SESSION['id_user']=$fetch['id_user'];
//         header('location: ../index.php');
//     }else{
//         header('Location: index.php');
//     }
// }
