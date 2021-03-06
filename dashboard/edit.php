<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header("Location: session/");
    exit;
}

if (isset($_COOKIE['keluar']) == 'true') {
    header("Location: session/");
    exit;
}
require '../function.php';
$user_name = $_SESSION['user_name'];
$id_user = $_SESSION['id_user'];

$id = $_GET["id"];
$user_id = $_GET['id_user'];


$barang = query("SELECT * FROM barang WHERE id = $id AND id_user='$user_id'");


if (isset($_POST["submit"])) {

    if (ubah($_POST) == true) {
        echo "
        <script>
            alert('data berhasil di edit');
            document.location.href= 'index.php';
        </script>";
    } else {
        echo "
        <script>
            alert('data gagal di edit');
            document.location.href= 'index.php';
        </script>";
    }
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../session/style-login.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="shortcut icon" href="../logo/favicon.png">
    <script src="https://cdn.tiny.cloud/1/1xrn42nc34pbg8nvbv5qaarngbn7j20qv8njdsi5gedhqzcx/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

    <title><?php echo $user_name ?> - Dashboard</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <div class="d-flex flex-column border-end">
                <a class="navbar-brand nav text-dark pe-1" href="../">
                    Portal <span class="text-primary ms-1">Dagang</span>
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
            <div class="navbar-nav d-none d-sm-flex flex-row me-auto">
                <a class="nav-link" href="../dashboard/">Semua Produk</a>
                <a class="nav-link ms-2 active" aria-current="page" href="">Tambah Produk</a>
            </div>
            <form method="POST" action="../dashboard/" class="d-none d-lg-flex">
                <input class="form-control me-2" name="keyword" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary" name="dashboard" type="submit">Search</button>
            </form>
            <div class="d-none d-sm-block dropdown ms-3">
                <button class="btn bg-light mt-2 mt-md-0 me-2 user text-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person me-2"></i><?php echo $user_name; ?>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="z-index: 9999;">
                    <li><a href="../" class="btn"><i class="bi bi-speedometer2 me-2"></i>Beranda</a></li>
                    <li><a href="../logout.php" class="btn"><i class="bi bi-box-arrow-left me-2"></i>Logout</a></li>
                </ul>
            </div>
            <!-- </div> -->

            <!-- tablet -->
            <button class="btn d-none d-sm-flex d-lg-none" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"">
                <span class=" navbar-toggler-icon"></span>
            </button>
            <div class="d-none d-sm-flex d-lg-none offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="height: 10vh;">
                <div class="container offcanvas-header flex-column">
                    <form method="POST" class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>

            <!-- mobile -->
            <button class="btn d-flex d-sm-none" data-bs-toggle="offcanvas" href="#offcanvasExample1" role="button" aria-controls="offcanvasExample"">
                <span class=" navbar-toggler-icon"></span>
            </button>
            <div class="d-flex d-sm-none offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample1" aria-labelledby="offcanvasExampleLabel" style="height: 20vh;">
                <div class="container offcanvas-header flex-column">
                    <form method="POST" class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div class="dropdown ms-3">
                        <button class="btn bg-light mt-2 mt-md-0 me-2 user text-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person me-2"></i><?php echo $user_name; ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1" style="z-index: 9999;">
                            <li><a href="../" class="btn"><i class="bi bi-speedometer2 me-2"></i>Beranda</a></li>
                            <li><a href="../logout.php" class="btn"><i class="bi bi-box-arrow-left me-2"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- add mobile -->
            <a href="../dashboard/" class="togle fixed-bottom bg-primary d-flex d-sm-none">
                <i class="bi bi-arrow-left m-auto text-white"></i>
            </a>
            <style>
                .togle {
                    left: 80%;
                    bottom: 51px;
                    width: 60px;
                    height: 60px;
                    border-radius: 50%;
                }
            </style>

        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 p-3 bg-white mt-3 rounded">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <h2 class="h2 text-dark">Ubah Produk</h2>
                    </div>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="gambarLama" value="<?php echo $barang['gambar'] ?>">
                    <div class="mb-3">
                        <label for="judul_barang" class="form-label">Judul Barang</label>
                        <input type="text" class="form-control" id="judul_barang" name="judul_barang" placeholder="" value="<?php echo $barang['judul_barang'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" placeholder="" value="<?php echo $barang['harga'] ?>">
                    </div>
                    <div class="mb-3">
                        <label for="wa" class="form-label">Nomor WhatsApp</label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">+62</span>
                            <input type="tel" class="form-control" id="wa" name="link" placeholder="" value="<?php echo $barang['link'] ?>">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="inputGroupFile01" class="form-label">Gambar <em>(thumbnail)</em></label>
                        <img src="../image/<?= $barang['gambar'] ?>" alt="" width="100%" class="mb-2 rounded">
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile01" name="gambar" placeholder="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Kategori</label>
                        <select name="kategori" class="form-select" aria-label="Default select example">
                            <?php
                            $kategori = $barang['kategori'];
                            $pakaian = '';
                            $Elektronik = '';
                            $Jasa = '';
                            $sepatu = '';
                            $Perlengkapan_Rumah = '';
                            if ($kategori = "Pakaian") {
                                $pakaian = "selected";
                            } elseif ($kategori = "Elektronik") {
                                $Elektronik = "selected";
                            } elseif ($kategori = "Jasa") {
                                $Jasa = "selected";
                            } elseif ($kategori = "Sepatu") {
                                $Sepatu = "selected";
                            } elseif ($kategori = "Perlengkapan Rumah") {
                                $Perlengkapan_Rumah = "selected";
                            } else {
                                echo "Kategori";
                            }
                            ?>
                            <option value="Pakaian" <?= $pakaian; ?>>Pakaian</option>
                            <option value="Elektronik" <?= $Elektronik; ?>>Elektronik</option>
                            <option value="Jasa" <?= $Jasa; ?>>Jasa</option>
                            <option value="Sepatu" <?= $sepatu; ?>>Sepatu</option>
                            <option value="Perlengkapan Rumah" <?= $Perlengkapan_Rumah; ?>>Perlengkapan Rumah</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea id="mytextarea" class="form-control" name="deskripsi" id="exampleFormControlTextarea1" placeholder="" rows="3"><?php echo $barang['deskripsi_barang'] ?></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary"><i class="bi bi-check2-circle me-2"></i>Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>