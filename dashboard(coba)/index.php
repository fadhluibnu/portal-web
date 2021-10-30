<?php

session_start();
$user_name = $_SESSION['user_name'];
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../session/style-login.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <title><?php echo $user_name; ?> - Dashboard</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-light bg-white">
        <div class="container pt-2 pb-2 flex-column flex-md-row">
            <a href="" class="navbar-brand d-none d-lg-block nav text-dark">
                Portal <span class="text-primary">Dagang</span>
            </a>
            <form class="d-flex me-2 form">
                <input class="form-control me-2" name="input" type="search" placeholder="Cari barang" aria-label="Search">
                <button class="btn btn-primary" name="cari" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div class="dropdown">
                <button class="btn bg-light mt-2 mt-md-0 me-2 user text-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person me-2"></i><?php echo $user_name; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="z-index: 9999;">
                    <li><a href="../" class="btn"><i class="bi bi-speedometer2 me-2"></i>Beranda</a></li>
                    <li><a href="#" class="btn"><i class="bi bi-box-arrow-left me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="sticky-top bg-white pb-2 pt-2">
        <div class="container">
            <nav class="rounded bg-white mb-2 border navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand nav text-dark" href="#"><i class="bi bi-person me-2"></i><?php echo $user_name; ?></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav m-auto">
                            <div class="produk">
                                <h4 class="h4 m-0 p-0">3</h4>
                                <h5 class="h5 m-0 p-0">Produk</h5>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Semua Produk</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Upload</button>
                </div>
            </nav>
        </div>
    </div>
    <div class="container mt-2">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="col-12 col-md-6 col-lg-4 mb-3">
                    <div class="card rounded border-white p-2">
                        <div class="img<?= $i ?> rounded"></div>
                        <!-- style img -->
                        <style>
                            div.img<?= $i ?> {
                                width: 100%;
                                height: 165px;
                                background-size: cover;
                                background-image:
                                    url("img/");
                            }
                        </style>

                        <div class="card-body mt-1 p-0">
                            <h5 class="card-title">
                                <?php
                                //echo $row['judul_barang']
                                ?>
                            </h5>
                            <table class="mb-2">
                                <tr>
                                    <td>
                                        <p class="harga p-0 m-0">Harga</p>
                                    </td>
                                    <td>
                                        <span class="harga">:</span>
                                    </td>
                                    <td>
                                        <div class="text-danger">
                                            <?php
                                            //echo $row['harga'];
                                            ?>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <div class="d-flex flex-column">
                                <a href="<?php //ini ntar ngarah ke detail tapi blm kebuat 
                                            ?>" class="btn btn-primary mb-2"><i class="bi bi-eye me-2"></i>Detail</a>
                                <a href="<?php //echo $row['link']
                                            ?>" class="btn btn-outline-primary"><i class="bi bi-chat-dots me-2"></i>Hubungi Penjual</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <form action="" method="post">
                            <h2 class="h2">Tambah Produk</h2>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>