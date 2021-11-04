<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../session/style-login.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="style-aktif.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <!-- <style>
        body {
            position: relative;
        }

        .container {
            margin-top: 100px;
        }
    </style> -->
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
            <a href="../" class="navbar-brand d-none d-sm-block nav text-dark">
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
    <nav id="navbarDetail" class="navbar navbar-light px-3 sticky-top" style="z-index: 1023;">
        <div class="container navbarDetail  bg-white p-3 rounded">
            <a href="../" class="nav-link"><i class="bi bi-chevron-left me-2"></i>Beranda</a>
            <ul class="nav nav-pills me-auto">
                <li class="nav-item">
                    <a href="#deskripsi" class="nav-link deskripsi bg-light text-dark">Deskripsi</a>
                </li>
                <li class="nav-item">
                    <a href="#diskusi" class="nav-link diskusi text-dark">Produk Serupa</a>
                </li>
            </ul>
            <a target="_blank" href="https://api.whatsapp.com/send?phone=" class="btn btn-primary ms-auto"><i class="bi bi-megaphone me-2"></i>Hubungi penjual</a>
        </div>
    </nav>

    <div id="deskripsi" class="container-fluid bg-light deskripsiDetail">
        <div class="row">
            <div class="col-12">
                <div id="satu" class="row">
                    <?php //muali loop 
                    ?>
                    <div class="col-4">
                        <div class="bg-white p-3 rounded sticky-top" style="top: 86px;">
                            <div id="gambarAsli" class="gambar rounded"></div>
                            <?php
                            $gambar = $gambar/* ini gambar */;
                            ?>
                            <style>
                                .gambar {
                                    width: 100%;
                                    height: 300px;
                                    background-color: wheat;
                                    background-size: cover;
                                    background-position: center;
                                    background-image: url(../image/<?php echo $gambar ?>);
                                }
                            </style>
                        </div>
                    </div>
                    <div class="col">
                        <div class="bg-white p-3 rounded sticky-top">
                            <h1 class="detail text-dark"><?php //ini judul 
                                                            ?></h1>
                            <hr>
                            <table>
                                <tr>
                                    <td>
                                        <span class="text-dark fw-bold">Harga</span>
                                    </td>
                                    <td>:</td>
                                    <td><span class="text-danger">Rp. <?php //ini harga 
                                                                        ?></span></td>
                                </tr>
                                <tr>
                                    <td><span class="text-dark fw-bold">Kategori</span></td>
                                    <td>:</td>
                                    <td><span class="text-dark"><?php //ini kategori 
                                                                ?></span></td>
                                </tr>
                                <tr>
                                    <td><span class="text-dark fw-bold">Deskripsi</span></td>
                                    <td>:</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><span class="text-dark"><?php //ini deskripsi 
                                                                            ?></span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="bg-white p-3 rounded sticky-top" style="top: 86px;">
                            <h5 class="h5">Komentar</h5>
                            <div class="komentar">
                                <div class="mb-1">
                                    <p class="text-dark mb-0">Komentar <span class=" fw-bold">User</span> :</p>
                                    <div class="ps-3">
                                        <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                                    </div>
                                </div>
                            </div>
                            <form action="">
                                <div class="mb-3">
                                    <label for="komentar" class="form-label fw-bold">Komentar</label>
                                    <div class="d-flex">
                                        <input type="text" class="form-control me-2" name="komentar" id="komentar" placeholder="komentar anda">
                                        <button type="button" class="btn btn-primary"><i class="bi bi-chat-right-text-fill"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="diskusi" class="container-fluid diskusiDetail mt-3" style="height: 500px;">
        <div class="row">
            <div class="col-6">
                <div class="bg-white p-3 rounded" style="height: 700px;">
                    pesan
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="detail.js"></script>
    <script>
        // window.addEventListener("resize", resizeWindow);

        // function resizeWindow() {
        //     var dataSpyList = [].slice.call(document.querySelectorAll('[data-bs-spy="scroll"]'));
        //     dataSpyList.forEach(function(dataSpyEl) {
        //         bootstrap.ScrollSpy.getInstance(dataSpyEl).refresh();
        //     })
        // }
    </script>
</body>

</html>