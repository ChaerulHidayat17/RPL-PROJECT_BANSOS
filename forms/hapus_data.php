<?php
// Ganti bagian berikut dengan koneksi dan logika penghapusan data dari database Anda
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "bansos";

// Buat koneksi
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah parameter ID Pengguna diberikan
if (isset($_GET["id"])) {
    $id_pengguna = $_GET["id"];

    // Hapus data dari database
    $sql = "DELETE FROM pengguna WHERE ID_Pengguna=$id_pengguna";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil dihapus!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID Pengguna tidak diberikan.";
}

$conn->close();
?>