<?php

//koneksi
$conn = mysqli_connect("localhost", "root", "", "portal-dagang");

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    // $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        // $rows[] = $row;
        $rows = $row;
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

function Tambah($data)
{
    global $conn;

    $id_user = $data['id_user'];
    $judul_barang = htmlspecialchars($data['judul_barang']);
    $harga = htmlspecialchars($data['harga']);
    $link = htmlspecialchars($data['link']);
    $kategori = htmlspecialchars($data['kategori']);
    $deskripsi_barang = $data['deskripsi'];

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO barang (id_user,judul_barang,deskripsi_barang,gambar,kategori,harga,link) VALUES ('$id_user','$judul_barang','$deskripsi_barang','$gambar','$kategori','$harga','$link')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload()
{
    $namafile = $_FILES['gambar']['name'];
    $size = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmp_name = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
                alert('Belum upload gambar')
            </script>";
        return false;
    }

    // cek gambar
    $ektensigambarValid = ['jpg', 'jpeg', 'png'];
    $ektensiGambar = explode('.', $namafile);
    $ektensiGambar = strtolower(end($ektensiGambar));

    if (!in_array($ektensiGambar, $ektensigambarValid)) {
        echo "<script>
                alert('Gambar tidak valid [jpg, jpeg, png]')
            </script>";
        return false;
    }

    // cek jika ukuran terlalu besar
    if ($size > 1500000) {
        echo "<script>
                alert('Ukuran gambar terlaku besar')
            </script>";
        return false;
    }

    // generate nama ganbar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ektensiGambar;


    // lolos pengecekan
    move_uploaded_file($tmp_name, '../image/' . $namaFileBaru);
    return $namaFileBaru;
}

function ubah($data)
{

    global $conn;

    $id = $data["id"];
    $judul_barang = htmlspecialchars($data["judul_barang"]);
    $harga = htmlspecialchars($data["harga"]);
    $link = htmlspecialchars($data["link"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $deskripsi_barang = $data["deskripsi"];

    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru
    if ($_FILES['gambar']['error'] === 4) {
        $gambar = $gambarLama;
    } else {
        $gambar = upload();
    }

    $sql = "UPDATE barang SET 
                        judul_barang = '$judul_barang',
                        harga = '$harga',
                        link = '$link',
                        gambar = '$gambar',
                        kategori = '$kategori',
                        deskripsi_barang = '$deskripsi_barang'
                    WHERE 
                        id = $id
                        ";
    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    return mysqli_affected_rows($conn);
}
