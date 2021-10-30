<?php
// session_start();
// include '../function.php';
// if (isset($_COOKIE['idp']) && isset($_COOKIE['keyp'])) {
//     $id = $_COOKIE['idp'];
//     $key = $_COOKIE['keyp'];

//     // cek cookie
//     $result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
//     $row = mysqli_fetch_assoc($result);


//     if ($key == hash('sha256', $row['id_user'])) {
//         $_SESSION['masuk'] = true;
//     }
// }

// $generate = mysqli_query($conn, "SELECT max(id) AS maxID FROM user");
// $fect_gen = mysqli_fetch_array($generate);
// $id = $fect_gen['maxID'];

// $huruf = 'ID';

// $id_user = $huruf . sprintf('%04s', $id);
// $username = htmlspecialchars(addslashes($_POST['usernameDaf']));
// $email = $_POST['emailDaf'];
// $password = password_hash($_POST['passwordDaf'], PASSWORD_DEFAULT);

// $get_email = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");

// if (mysqli_num_rows($get_email) > 0) {
//     echo "
//     <script>
//         alert('Email ini telah digunakan');
//         window.location.href = '../session/'
//     </script>";
// } else {
//     $_SESSION['user_name'] = $username;
//     $_SESSION['id_user'] = $id_user;
//     $_SESSION['masuk'] = true;
//     setcookie('idp', $row['id'], time() + 70);
//     setcookie('keyp', hash('sha256', $row['id_user']), time() + 70);
//     $query = mysqli_query($conn, "INSERT INTO user (id_user, username, email, password) VALUES('$id_user', '$username', '$email', '$password')");
//     if ($query == true) {
//         header('Location: ../');
//         exit;
//     }
// }
