<?php
session_start();
require '../function.php';
if (!isset($_SESSION['masuk'])) {
    header("Location: session/");
    exit;
}

if (isset($_COOKIE['keluar']) == 'true') {
    header("Location: session/");
    exit;
}
$user_name = $_SESSION['user_name'];
$result = mysqli_query($conn, "SELECT * FROM barang");
if (isset($_GET['category'])) {
    $kategori = $_GET['category'];
    $result = mysqli_query($conn, "SELECT * FROM barang WHERE kategori LIKE '%$kategori%'");
}
if (isset($_POST['cari'])) {
    $kategori = $_GET['category'];
    $input = $_POST['input'];
    $result = mysqli_query($conn, "SELECT * FROM barang WHERE kategori LIKE '%$kategori%' AND judul_barang LIKE '%$input%'");
}
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
    <link rel="shortcut icon" href="../logo/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <title>Category <?= $kategori ?> - Portal Dagang</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-light bg-white fixed-top">
        <div class="container pt-2 pb-2 flex-column flex-md-row">
            <div class="d-flex flex-column">
                <a href="../" class="navbar-brand d-none d-sm-block nav text-dark pb-0">
                    Portal <span class="text-primary">Dagang</span>
                </a>
                <div class="d-flex">
                    <a target="_blank" class="navbar-brand pt-0" href="https://itfestpolsri.com/">
                        <img src="../logo/00_LOGO ITFESTIVAL.png" alt="LOGO ITFESTIVAL" width="20" height="20">
                    </a>
                    <a target="_blank" class="navbar-brand pt-0" href="https://linktr.ee/HMJManajemenInformatika">
                        <img src="../logo/Logo HMJMI.png" alt="Logo HMJMI" width="20" height="20">
                    </a>
                    <a target="_blank" class="navbar-brand pt-0" href="https://itfestpolsri.com/">
                        <img src="../logo/logo-polsri.png" alt="logo polsri" width="20" height="20">
                    </a>
                </div>
            </div>
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
    <div class="container-fluid pt-5 pt-md-4">
        <div class="row justify-content-center" style="height: 700px;">
            <div class="col col-md-3 fixed-bottom sticky-md-top">
                <div class="bg-white p-3 rounded">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a href="../" class="text-start text-dark font-cate btn"><i class="bi bi-house-door me-2"></i>Beranda</a>
                        <div class="mt-2 accordion" id="accordionExample">
                            <div class="accordion-item border-0">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="ps-3 accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="bi bi-list-nested me-2"></i>Kategori
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="pt-1 ps-1 accordion-body">
                                        <ul class="ps-2" type="none">
                                            <li class="nav-item rounded hover mt-2">
                                                <a href="../category/?category=Pakaian" class="w-100 text-start btn"><i class="bi bi-x-diamond me-2"></i>Pakaian</a>
                                            </li>
                                            <li class="nav-item rounded hover mt-2">
                                                <a href="../category/?category=Elektronik" class="w-100 text-start btn"><i class="bi bi-x-diamond me-2"></i>Elektronik</a>
                                            </li>
                                            <li class="nav-item rounded hover mt-2">
                                                <a class="nav-link text-dark" href="../category/?category=Jasa"><i class="bi bi-x-diamond me-2"></i>Jasa</a>
                                            </li>
                                            <li class="nav-item rounded hover mt-2">
                                                <a class="nav-link text-dark" href="../category/?category=Sepatu"><i class="bi bi-x-diamond me-2"></i>Sepatu</a>
                                            </li>
                                            <li class="nav-item rounded hover mt-2">
                                                <a class="nav-link text-dark" href="../category/?category=Perlengkapan Rumah"><i class="bi bi-x-diamond me-2"></i>Perlengkapan Rumah</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 col-md-8 ">
                <div class="row">
                    <?php
                    $i = 0;
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                        <div class="mt-3 alert bg-success alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">
                            <span class="text-light">Category <strong><?= $kategori; ?></strong></span>
                            <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-lg text-light"></i></button>
                        </div>
                        <?php
                        while ($row = mysqli_fetch_array($result)) : ?>
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
                                                url("../image/<?php echo $row['gambar'] ?>");
                                        }
                                    </style>

                                    <div class="card-body mt-1 p-0">
                                        <h5 class="card-title">
                                            <?php
                                            echo $row['judul_barang']
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
                                                        echo $row['harga'];
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <div class="d-flex flex-column">
                                            <a href="../detail/detail.php?id=<?php echo $row['id'] ?>&category=<?php echo $row['kategori'] ?>" class="btn btn-primary mb-2"><i class="bi bi-eye me-2"></i>Detail</a>
                                            <a href="https://api.whatsapp.com/send?phone=+62<?php echo $row['link'] ?>" class="btn btn-outline-primary"><i class="bi bi-chat-dots me-2"></i>Hubungi Penjual</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                            $i++;
                        endwhile;
                    } else { ?>
                        <div class="mt-3 alert bg-danger alert-dismissible fade show d-flex align-items-center justify-content-between" role="alert">
                            <span class="text-light">Category <strong><?= $kategori; ?></strong> tidak ditemukan</span>
                            <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"><i class="bi bi-x-lg text-light"></i></button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>