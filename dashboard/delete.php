<?php
require 'function.php';
$id = $_GET["id"];

if (hapus($id) > 0>) {
    echo "
    <script>
    alert('Produk berhasil di hapus');
    //document.location.href='../dashboard/'
    </script>";
}else {
    echo "
    <script>
    alert('Produk gagal di hapus');
    //document.location.href='../dashboard/'
    </script>";
}


?>