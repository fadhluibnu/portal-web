<?php
session_start();
if (!isset($_SESSION['masuk'])) {
    header("Location: ../session/");
    exit;
}
include '../function.php';
$user_name = $_SESSION['user_name'];
$id_user = $_SESSION['id_user'];
$result = mysqli_query($conn, "SELECT * FROM barang WHERE id_user='$id_user'");
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
                    <a class="nav-link active" aria-current="page" href="">Semua Produk</a>
                    <a class="nav-link" href="upload.php">Tambah Produk</a>
                </div>
            </div>
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
    </nav>
    <div class="container p-3 bg-white rounded mt-3">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul Produk</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <th scope="row">1</th>
                        <td>
                            <?= $row["judul_barang"] ?>
                        </td>
                        <td>
                            <?= $row["kategori"] ?>
                        </td>
                        <td>
                            <?= $row["harga"] ?>
                        </td>
                        <td>
                            <a class="btn btn-warning text-white" href="edit.php?id=<?php echo $row['id']; ?>&id_user=<?php echo $id_user ?>"><i class=" bi bi-pencil-square me-2"></i>Edit
                            </a>

                            <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>&id_user=<?php echo $id_user ?>"><i class="bi bi-trash2-fill me-2"></i>Hapus
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