<?php

//koneksi
$conn = mysqli_connect("localhost", "root", "", "portal-dagang");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function cari($keyword)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM barang
    WHERE 
    judul_barang LIKE '%$keyword%' OR
    kategori LIKE '%$keyword%'
    ");
    return $query;
}

// function ubah($conn) {

//     global $conn;

//     $id = $data["id"];
//     $judul_barang = htmlspecialchars $_POST["judul_barang"];
//     $harga = htmlspecialchars $_POST["harga"];
//     $link = htmlspecialchars $_POST["link"];
//     $gambar = htmlspecialchars $_POST["gambar"];
//     $kategori = htmlspecialchars $_POST["kategori"];
//     $deskripsi_barang = htmlspecialchars $_POST["deskripsi"];

//     $sql = "UPDATE barang SET 
//                         judul_barang = '$judul_barang',
//                         harga = '$harga',
//                         link = '$link',
//                         gambar = $gambar,
//                         kategori = '$kategori',
//                         deskripsi_barang = '$deskripsi_barang'
//                     WHERE 
//                         id = $id
//                         ";
//     mysqli_query($conn,$sql);

//     return mysqli_affected_rows($conn)
//}
