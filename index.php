<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <title>Portal Dagang</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-light bg-white fixed-top">
        <div class="container pt-2 pb-2 flex-column flex-md-row">
            <a href="" class="navbar-brand d-none d-lg-block nav text-dark">
                Portal <span class="text-primary">Dagang</span>
            </a>
            <form class="d-flex me-2 form">
                <input class="form-control me-2" name="input" type="search" placeholder="Cari barang" aria-label="Search">
                <button class="btn btn-primary" name="cari" type="submit"><i class="bi bi-search"></i></button>
            </form>
            <div class="dropdown">
                <button class="btn bg-light mt-2 mt-md-0 me-2 user text-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person me-2"></i>Username
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="bi bi-person me-2"></i>Profil
                        </button>
                    </li>
                    <li><a href="dashboard/" class="btn"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a></li>
                    <li><a href="#" class="btn"><i class="bi bi-box-arrow-left me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 pb-5">
    </div>
    <div class="container-fluid pt-5 pt-md-0">
        <div class="row" style="height: 700px;">
            <div class="col col-md-3 fixed-bottom sticky-md-top">
                <div class="bg-white p-3 rounded">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="text-start font nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#beranda" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="bi bi-house-door me-2"></i>Beranda</button>
                        <button class="text-start font nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#kategori" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false"><i class="bi bi-list me-2"></i>Kategori</button>
                    </div>
                </div>
            </div>
            <div class="col col-md-9 ">
                <div class="d-flex align-items-start">
                    <div class="tab-content" id="v-pills-tabContent">
                        <!-- beranda -->
                        <div class="tab-pane fade show active" id="beranda" role="tabpanel" aria-labelledby="v-pills-home-tab">
                            <div class="row">

                                <!-- lopping mulai dari sini -->
                                <div class="col bg-light">
                                    <div class="card rounded border-white p-2" style="width: 18rem;">
                                        <div class="img rounded"></div>
                                        <!-- style img -->
                                        <style>
                                            div.img {
                                                width: 100%;
                                                height: 165px;
                                                background-image: url("<?php //ini buat naruh column gambar di tabel barang ?>");
                                                background-size: cover;
                                            }
                                        </style>

                                        <div class="card-body mt-1 p-0">
                                            <h5 class="card-title">
                                                <?php
                                                //ini buat judul_barang tabel barang 
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
                                                            //ini buat naruh harga di tabel barang
                                                            ?>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <div class="d-flex flex-column">
                                                <a href="<?php //ini ntar ngarah ke detail tapi blm kebuat 
                                                            ?>" class="btn btn-primary mb-2"><i class="bi bi-eye me-2"></i>Detail</a>
                                                <a href="<?php //ini buat naruh link di tabel barang 
                                                            ?>" class="btn btn-outline-primary"><i class="bi bi-chat-dots me-2"></i>Hubungi Penjual</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- kategori -->
                        <div class="tab-pane fade" id="kategori" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>