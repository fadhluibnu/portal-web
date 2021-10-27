<?php
include 'function.php';

$portal-dagang


$barang = query("SELECT * FROM barang");


if(isset($_POST["cari"])){
    $barang = cari($_POST["keyword"])
}

