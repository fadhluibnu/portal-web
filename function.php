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
