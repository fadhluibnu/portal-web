<?php
$conn = mysqli_connect("localhost", "root", "", "portal-dagang");


$result = mysqli_query($conn,"SELECT * FROM barang");

// ($brng=mysqli_fetch_assoc($result);
//     var_dump($brng);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta tharset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hapus produk</title>
</head>
<body>
    <h1>Daftar produk</h1>

    <table border = "1" cellpadding="10" cellspacing="0">

    <tr>
        <th>hapus</th>
        <th>gambar</th>
        <th>judul barang </th>
        <th>deskripsi barang</th>
        <th>ketegori</th>
        <th>harga</th>
        <th>link</th>
    </tr>


    <?php while( $row = mysqli_fetch_assoc($result) ): ?>
    <tr>
        <td> <a href="">hapus</a></td> 
        <td><img src="img/<?=  $row ["gambar"];?>" width="50"></td>
        <td><?= $row ["judul_barang"] ?></td>
        <td><?= $row ["deskripsi_barang"]?></td>
        <td><?= $row ["kategori"] ?></td>
        <td><?= $row ["harga"] ?></td>
        <td><a href="https://api.whatsapp.com/send?phone=+6281326237199">link</a></td>
    </tr>
    <?php  endwhile; ?>





</body>
</html>