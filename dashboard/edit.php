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

    if (ubah($_POST) > 0) {
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

    <title><?php echo $user_name ?> - Dashboard</title>
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand nav text-dark pe-4 border-end" href="../">
                Portal <span class="text-primary ms-1">Dagang</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="../dashboard/">Semua Produk</a>
                    <a class="nav-link active" aria-current="page" href="">ubah Produk</a>
                </div>
            </div>
            <form class="d-flex">
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
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 p-3 bg-white mt-3 rounded">
                <form action="" method="post">
                    <div class="mb-3">
                        <h2 class="h2 text-dark">Ubah Produk</h2>
                    </div>
                    <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
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
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile01" name="gambar" placeholder="<?php echo $barang['gambar'] ?>" value="<?php echo $barang['gambar'] ?>">
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
                        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" placeholder="" rows="3"><?php echo $barang['deskripsi_barang'] ?></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary"><i class="bi bi-check2-circle me-2"></i>Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>