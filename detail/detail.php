<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../session/style-login.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <title>Hello, world!</title>
</head>

<?php
session_start();
require '../function.php';
$user_name = $_SESSION['user_name'];
?>

<body class="bg-light">
    <nav class="navbar navbar-light bg-white">
        <div class="container pt-2 pb-2 flex-column flex-md-row">
            <a href="../" class="navbar-brand d-none d-lg-block nav text-dark">
                Portal <span class="text-primary">Dagang</span>
            </a>
            <form method="POST" class="d-flex me-2 form">
                <input class="form-control me-2" name="input" type="search" placeholder="Cari barang" aria-label="Search">
                <button class="btn btn-primary" name="cari" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div class="dropdown">
                <button class="btn bg-light mt-2 mt-md-0 me-2 user text-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person me-2"></i><?php echo $user_name; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a href="../dashboard/" class="btn"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                    <li><a href="../logout.php" class="btn"><i class="bi bi-box-arrow-left me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
            <a class="nav-link" href="../"><i class="bi bi-chevron-left me-1"></i>Beranda</a>
            <ul class="nav me-auto nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="#scrollspyHeading1">First</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#scrollspyHeading2">Second</a>
                </li>
            </ul>
        </nav>
        <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example" tabindex="0">
            <section id="scrollspyHeading1">
                <div class="row">
                    <div class="col-4">
                        <div class="bg-white p-3 rounded">
                            <div id="gambarAsli" class="gambar rounded"></div>
                            <?php
                            $gambar = "617fff4f06e40.jpg";
                            ?>
                            <style>
                                .gambar {
                                    width: 100%;
                                    height: 200px;
                                    background-color: wheat;
                                    background-size: cover;
                                    background-position: center;
                                    background-image: url(../image/<?php echo $gambar ?>);
                                }
                            </style>
                            <div class="d-flex">
                                <div onclick="change1()" id="gambarDukung1" class="mt-2 gambar-pendukung1 rounded"></div>
                                <div onclick="change2()" id="gambarDukung2" class="mt-2 gambar-pendukung2 rounded"></div>
                            </div>
                            <?php
                            $gambar2 = "617ffeacdc621.jpg";
                            ?>
                            <style>
                                .gambar-pendukung1,
                                .gambar-pendukung2 {
                                    width: 70px;
                                    height: 70px;
                                    cursor: pointer;
                                    background-color: wheat;
                                    background-size: cover;
                                    background-position: center;
                                    background-image: url(../image/<?php echo $gambar ?>);
                                }

                                .gambar-pendukung2 {
                                    background-image: url(../image/<?php echo $gambar2 ?>);
                                }
                            </style>
                            <script>
                                $(document).ready(function() {
                                    $('#gambarDukung1').click(function() {
                                        $('#gambarAsli').css('background-image', 'url("../image/<?php echo $gambar ?>")')
                                    })
                                    $('#gambarDukung2').click(function() {
                                        $('#gambarAsli').css('background-image', 'url("../image/<?php echo $gambar2 ?>")')
                                    })
                                })
                            </script>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-white p-3 rounded">
                            detail
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="bg-white p-3 rounded">
                            pesan
                        </div>
                    </div>
                </div>
            </section>
            <h4 id="scrollspyHeading2">Second heading</h4>
            <p>...</p>
        </div>
    </div>
    <div class="container">
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>