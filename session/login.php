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


// $email = $_POST["email"];
// $password = $_POST["password"];

// $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");


// //cek email nya

// if (mysqli_num_rows($result) == 1) {
//     $row = mysqli_fetch_assoc($result);
//     if (password_verify($password, $row['password'])) {
//         $_SESSION['user_name'] = $row['username'];
//         $_SESSION['id_user'] = $row['id_user'];
//         $_SESSION['masuk'] = true;
//         setcookie('idp', $row['id'], time() + 70);
//         setcookie('keyp', hash('sha256', $row['id_user']), time() + 70);
//         header('Location: ../');
//         exit;
//     } else {
//         echo "
//             <script>
//                 alert('Gagal Login');
//                 window.location.href = '../session/';
//             </script>";
//     }
// } else {
//     echo "
//         <script>
//             alert('Gagal Login');
//             window.location.href = '../session/';
//         </script>";
// }
