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
include '../function.php';
$user_name = $_SESSION['user_name'];
$id_user = $_SESSION['id_user'];
$result = mysqli_query($conn, "SELECT * FROM barang WHERE id_user='$id_user'");

if (isset($_POST['dashboard'])) {
    $keyword = $_POST['keyword'];
    $result = mysqli_query($conn, "SELECT * FROM barang WHERE id_user='$id_user' AND judul_barang LIKE '%$keyword%'");
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
            <div class="navbar-nav d-none d-sm-flex flex-row me-auto">
                <a class="nav-link active" aria-current="page" href="">Semua Produk</a>
                <a class="nav-link ms-2" href="upload.php">Tambah Produk</a>
            </div>
            <form method="POST" class="d-none d-lg-flex">
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
            <a href="upload.php" class="togle fixed-bottom bg-primary d-flex d-sm-none">
                <i class="bi bi-plus-lg m-auto text-white"></i>
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
    <div class="container p-3 bg-white rounded mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Produk</th>
                    <th class=" d-none d-sm-table-cell" scope="col">Kategori</th>
                    <th class=" d-none d-sm-table-cell" scope="col">Harga</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_assoc($result)) :
                    $i++ ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td>
                            <?= $row["judul_barang"] ?>
                        </td>
                        <td class="d-none d-sm-table-cell">
                            <?= $row["kategori"] ?>
                        </td>
                        <td class=" d-none d-sm-table-cell">
                            <?= $row["harga"] ?>
                        </td>
                        <td class="d-flex flex-column flex-sm-row">
                            <a class="btn btn-warning text-white me-0 me-sm-2 mb-2 mb-sm-0" href="edit.php?id=<?php echo $row['id']; ?>&id_user=<?php echo $id_user ?>"><i class=" bi bi-pencil-square me-2"></i>Edit
                            </a>

                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>&id_user=<?php echo $id_user ?>"><i class="bi bi-trash2-fill me-2" <?php $row["id"]; ?>></i>Hapus
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>

        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>