<?php
session_start();
require '../function.php';
if (isset($_COOKIE['idp']) && isset($_COOKIE['keyp'])) {
    $id = $_COOKIE['idp'];
    $key = $_COOKIE['keyp'];

    // cek cookie
    $result = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    if ($key === hash('sha256', $row['id_user'])) {
        $_SESSION['masuk'] = true;
        $_SESSION['user_name'] = $row['username'];
        $_SESSION['id_user'] = $row['id_user'];
    }
}

if (isset($_SESSION['masuk'])) {
    header("Location: ../");
    exit;
}

if (isset($_POST['login'])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $result_login = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");


    //cek email nya

    if (mysqli_num_rows($result_login) == 1) {
        $row = mysqli_fetch_assoc($result_login);
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_name'] = $row['username'];
            $_SESSION['id_user'] = $row['id_user'];
            $_SESSION['masuk'] = true;
            setcookie('idp', $row['id'], time() + 1000);
            setcookie('keyp', hash('sha256', $row['id_user']), time() + 1000);
            header('Location: ../');
            exit;
        } else {
            echo "
            <script>
                alert('Gagal Login');
            </script>";
        }
    } else {
        echo "
        <script>
            alert('Gagal Login');
        </script>";
    }
}
if (isset($_POST['daftar'])) {

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
        echo "
            <script>
                alert('Email ini telah digunakan');
            </script>";
    } else {
        $_SESSION['user_name'] = $username;
        $_SESSION['id_user'] = $id_user;
        $_SESSION['masuk'] = true;
        setcookie('idp', $row['id'], time() + 1000);
        setcookie('keyp', hash('sha256', $row['id_user']), time() + 1000);
        $query = mysqli_query($conn, "INSERT INTO user (id_user, username, email, password) VALUES('$id_user', '$username', '$email', '$password')");
        if ($query == true) {
            header('Location: ../');
            exit;
        }
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style-login.css">
    <title>Login - Portal Dagang</title>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row" style="height: 100vh;">
            <div class="row m-auto align-items-center">
                <div class="col-6">
                    <h1 class="h1 text-dark">Portal <span class="text-primary">Dagang</span></h1>
                </div>
                <div class="col-6 bg-white p-3 rounded">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                            <script>
                                var login = document.getElementById('nav-home-tab');
                                login.addEventListener('click', function() {
                                    document.title = 'Login - Portal Dagang'
                                })
                            </script>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#daftar" type="button" role="tab" aria-controls="daftar" aria-selected="false">Daftar</button>
                            <script>
                                var login = document.getElementById('nav-profile-tab');
                                login.addEventListener('click', function() {
                                    document.title = 'Daftar - Portal Dagang'
                                })
                            </script>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="" method="POST">
                                <div class="mt-3 mb-3">
                                    <h2 class="h2 text-dark mb-0">Masuk</h2>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" required>
                                    <a href="" class="nav-link mt-1 p-0">Forgot password?</a>
                                </div>
                                <button type="submit" name="login" class="w-100 pt-3 pb-3 btn btn-primary"><i class="bi bi-door-open-fill me-2"></i>Login</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="daftar" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="" method="POST">
                                <div class="mt-3 mb-3">
                                    <h2 class="h2 text-dark mb-0">Daftar</h2>
                                </div>
                                <div class="mb-3">
                                    <label for="usernameDaf" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="usernameDaf" id="usernameDaf" required>
                                </div>
                                <div class="mb-3">
                                    <label for="emailDaf" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="emailDaf" id="emailDaf" required>
                                    <div></div>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordDaf" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="passwordDaf" id="passwordDaf" required>
                                </div>
                                <button type="submit" name="daftar" class="w-100 pt-3 pb-3 btn btn-primary"><i class="bi bi-box-arrow-in-down me-2"></i>Daftar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>