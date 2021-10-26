<?php
include '../function.php';

$generate = mysqli_query($conn, "SELECT max(id) AS maxID FROM user");
$fect_gen = mysqli_fetch_array($generate);
$id = $fect_gen['maxID'];

$huruf = 'ID';

$id_user = $huruf . sprintf('%04s', $id);
$username = htmlspecialchars(addslashes($_POST['username']));
$email = $_POST['email'];
$password = hash('sha256', $_POST['password']);

$query = mysqli_query($conn, "INSERT INTO user (id_user, username, email, password) VALUES('$id_user', '$username', '$email', '$password')");

if ($query == true) {
    echo 'berhasil';
}
