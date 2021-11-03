<?php
require '../function.php';
$id = $_GET["id"];

$delete = mysqli_query($conn, "DELETE FROM barang WHERE id = $id");
if ($delete == true) {
    echo "
    <script>
    alert('Produk berhasil di hapus');
    document.location.href='../dashboard/'
    </script>";
} else {
    echo "
    <script>
    alert('Produk gagal di hapus');
    document.location.href='../dashboard/'
    </script>";
}
