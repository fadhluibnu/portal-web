<?php
session_start();
require '../function.php';
$password_salah = false;
$email_notFound = false;
$nama_notFound = '';
$email_digunakan = false;
$error_regist = false;
$login_aktif = 'active';
$daftar_aktif = '';
$nama_email = '';

// cek cookie
if (isset($_COOKIE['portal_user']) && isset($_COOKIE['portal_masuk'])) {
    echo "<script>
    alert('hapus')
</script>";
    $id = $_COOKIE['portal_user'];
    $id_user = $_COOKIE['portal_masuk'];

    // ambil data
    $cookie = mysqli_query($conn, "SELECT * FROM user WHERE id=$id");
    $row_cookie = mysqli_fetch_assoc($cookie);

    // cek apakah cookie benar
    if ($id_user == hash('sha256', $row_cookie['id_user'])) {
        $_SESSION['user_name'] = $row_cookie['username'];
        $_SESSION['id_user'] = $row_cookie['id_user'];
        $_SESSION['masuk'] = true;
    }
}

if (isset($_SESSION['masuk'])) {
    header("Location: ../");
    exit;
}


// login
if (isset($_POST['login'])) {

    // tangkap name
    $email = $_POST['email'];
    $nama_notFound = $email;
    $nama_email = $email;
    $password = hash('sha256', $_POST['password']); ?>
    <script>
        var email = "<?php echo $email ?>";
    </script>
    <?php

    // ambil data 
    $data = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");

    // cek login
    if (mysqli_num_rows($data) == 1) {
        $row_data = mysqli_fetch_assoc($data);

        // cek password
        if ($password == $row_data['password']) {

            // membuat session yang dibutuhkan
            $_SESSION['user_name'] = $row_data['username'];
            $_SESSION['id_user'] = $row_data['id_user'];
            $_SESSION['masuk'] = true;

            // membuat cookie
            setcookie('portal_user', $row_data['id'], time() + 3600, "/");
            setcookie('portal_masuk', hash('sha256', $row_data['id_user']), time() + 3600, "/");

            // pindahkan ke halaman beranda
            header("Location: ../");
            exit;
        } else {
            $password_salah = true;
        }
    } else {
        $email_notFound = true;
        $nama_email = '';
    }
}

// registrasi
if (isset($_POST['daftar'])) {
    $login_aktif = '';
    $daftar_aktif = 'active';

    $generate = mysqli_query($conn, "SELECT max(id) AS maxID FROM user");
    $fect_gen = mysqli_fetch_array($generate);
    $id = $fect_gen['maxID'];
    $huruf = 'ID';

    $id_user = $huruf . sprintf('%04s', $id);
    $username = htmlspecialchars(addslashes($_POST['usernameDaf']));
    $email = htmlspecialchars($_POST['emailDaf']);
    $password = hash('sha256', $_POST['passwordDaf']);
    $nama_notFound = $email;
    ?>
    <script>
        var email = "<?php echo $email ?>";
    </script>
<?php

    // cek apakah email sudah digunakan
    $cek_email = mysqli_query($conn, "SELECT * FROM user WHERE email='$email'");
    if (mysqli_num_rows($cek_email) == 0) {

        // insert data registrasi
        $daftar = mysqli_query($conn, "INSERT INTO user (id_user,username,email,password) 
        VALUES ('$id_user','$username','$email','$password')");

        // cek jika berhasil
        if ($daftar == true) {

            // membuat session yang dibutuhkan
            $_SESSION['user_name'] = $username;
            $_SESSION['id_user'] = $id_user;
            $_SESSION['masuk'] = true;

            // membuat cookie
            $cookie = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
            $row_cookie = mysqli_fetch_assoc($cookie);
            setcookie('portal_user', $row_cookie['id'], time() + 3600, "/");
            setcookie('portal_masuk', hash('sha256', $row_cookie['id_user']), time() + 3600, "/");

            // pindahkan ke halaman beranda
            header("Location: ../");
            exit;
        } else {
            $error_regist = true;
        }
    } else {
        $email_digunakan = true;
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
    <link rel="shortcut icon" href="../logo/favicon.png">
    <title>Login - Portal Dagang</title>
</head>

<body class="bg-light d-flex" style="width: 100%;height:100vh;">
    <div class="container m-auto">
        <div class="row flex-column flex-md-row align-items-center">
            <div class="col-12 col-md-5 col-lg-6 mb-3 mb-md-0">
                <h1 class="h1 text-dark">Portal <span class="text-primary">Dagang</span></h1>
                <div class="d-flex">
                    <a target="_blank" class="navbar-brand pt-0" href="https://itfestpolsri.com/">
                        <img src="../logo/00_LOGO ITFESTIVAL.png" alt="LOGO ITFESTIVAL" width="70" height="70">
                    </a>
                    <a target="_blank" class="navbar-brand pt-0" href="https://linktr.ee/HMJManajemenInformatika">
                        <img src="../logo/Logo HMJMI.png" alt="Logo HMJMI" width="70" height="70">
                    </a>
                    <a target="_blank" class="navbar-brand pt-0" href="https://itfestpolsri.com/">
                        <img src="../logo/logo-polsri.png" alt="logo polsri" width="70" height="70">
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-6">
                <div class="bg-white p-3 rounded">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link <?php echo $login_aktif ?>" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#login" type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                            <script>
                                var login = document.getElementById('nav-home-tab');
                                login.addEventListener('click', function() {
                                    document.title = 'Login - Portal Dagang'
                                })
                            </script>
                            <button class="nav-link <?php echo $daftar_aktif ?>" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#daftar" type="button" role="tab" aria-controls="daftar" aria-selected="false">Daftar</button>
                            <script>
                                var login = document.getElementById('nav-profile-tab');
                                login.addEventListener('click', function() {
                                    document.title = 'Daftar - Portal Dagang'
                                })
                            </script>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show <?php echo $login_aktif ?>" id="login" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form action="" method="POST">
                                <div class="mt-3 mb-3">
                                    <h2 class="h2 text-dark mb-0">Masuk</h2>
                                </div>
                                <?php if ($email_notFound == true) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Email <strong><?php echo $nama_notFound ?></strong> tidak ditemukan
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email" value="<?php echo $nama_email; ?>">
                                </div>
                                <?php if ($password_salah == true) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Password tidak cocok
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <button type="submit" name="login" class="w-100 pt-3 pb-3 btn btn-primary"><i class="bi bi-door-open-fill me-2"></i>Login</button>
                            </form>
                        </div>
                        <div class="tab-pane fade show <?php echo $daftar_aktif ?>" id="daftar" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="" method="POST">
                                <div class="mt-3 mb-3">
                                    <h2 class="h2 text-dark mb-0">Daftar</h2>
                                </div>
                                <div class="mb-3">
                                    <label for="usernameDaf" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="usernameDaf" id="usernameDaf" required>
                                </div>
                                <?php if ($email_digunakan == true) : ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        Email <strong><?php echo $nama_notFound ?></strong> telah digunakan
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>
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