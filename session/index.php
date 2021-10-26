<?php
require '../function.php';

// if (isset($_POST["register"])) {
//     if (registrasi($_POST) > 0) {
//         echo "<script>
//             alert('user baru berhasil ditambahkan');
//              <script>";
//     } else {
//         echo mysqli_error($conn);
//     }
// }


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
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                    <a href="" class="nav-link mt-1 p-0">Forgot password?</a>
                                </div>
                                <button type="submit" name="daftar" class="w-100 pt-3 pb-3 btn btn-primary"><i class="bi bi-door-open-fill me-2"></i>Login</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="daftar" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form action="registrasi.php" method="POST">
                                <div class="mt-3 mb-3">
                                    <h2 class="h2 text-dark mb-0">Daftar</h2>
                                </div>
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" name="username" id="username">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="email">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="confirm_pass" class="form-label">Confirm password</label>
                                    <input type="password" class="form-control" name="confirm_pass" id="confirm_pass">
                                </div> -->
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