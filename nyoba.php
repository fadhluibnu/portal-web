<!DOCTYPE html>
<html>
<body>

<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "portal-dagang";

// Create connection
$conn = mysqli_connect("localhost", "root", "", "portal-dagang");
// Check connection


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, id_user, judul_barang ,deskripsi_barang , gambar FROM barang";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. " - Name: ". $row["id_user"]. " " . $row["judul_barang"] . $row["deskripsi_barang"] . $row["gambar"]."<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>