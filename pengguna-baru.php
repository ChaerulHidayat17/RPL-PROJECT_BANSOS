<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bantuan-sosial";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Data pengguna
$email = 'BansosQu@admin.com';
$password = 'admin123';

// Hash password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// Lindungi dari SQL Injection
$email = mysqli_real_escape_string($conn, $email);

// Query untuk menambahkan pengguna baru
$sql = "INSERT INTO admin (email, password_hash) VALUES ('$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Pengguna baru berhasil ditambahkan!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Tutup koneksi database
$conn->close();
?>