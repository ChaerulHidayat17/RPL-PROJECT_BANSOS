<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "bansos";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari formulir
$nama = $_POST['nama'];
$nik = $_POST['nik'];
$no_whatsapp = $_POST['no_whatsapp'];
$alamat = $_POST['alamat'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi kata sandi

// Siapkan dan jalankan kueri SQL untuk menyimpan data
$sql = "INSERT INTO pengguna (Nama_Pengguna, NIK, No_Whatsapp, Alamat, Password) VALUES ('$nama', $nik, '$no_whatsapp', '$alamat', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Selamat Anda Berhasil Mendaftar";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>