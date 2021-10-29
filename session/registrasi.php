<?php
include '../function.php';
session_start();

$generate = mysqli_query($conn, "SELECT max(id) AS maxID FROM user");
$fect_gen = mysqli_fetch_array($generate);
$id = $fect_gen['maxID'];

$huruf = 'ID';

$id_user = $huruf . sprintf('%04s', $id);
$username = htmlspecialchars(addslashes($_POST['usernameDaf']));
$email = $_POST['emailDaf'];
$password = password_hash($_POST['passwordDaf'], PASSWORD_DEFAULT);

$get_email = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");

if (mysqli_num_rows($get_email) > 0) {
    $_SESSION['user_name'] = $username;
    echo "
    <script>
        alert('Email ini telah digunakan');
        window.location.href = '../session/'
    </script>";
} else {
    $query = mysqli_query($conn, "INSERT INTO user (id_user, username, email, password) VALUES('$id_user', '$username', '$email', '$password')");
    if ($query == true) {
        header('Location: ../');
        exit;
    }
}
