<?php

//koneksi
$conn = mysqli_connect("localhost", "root", "", "portal-dagang");

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    $rows =[];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row
    }
    return $rows;
}

function cari($keyword){
    query = "SELECT * FROM barang
            WHERE 
            kategori LIKE '$keyword%'
            ";
    return query ($query);
}