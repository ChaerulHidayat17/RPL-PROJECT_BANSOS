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

// Ambil data dari formulir
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Lindungi dari SQL Injection
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$subject = mysqli_real_escape_string($conn, $subject);
$message = mysqli_real_escape_string($conn, $message);

// Query untuk menyimpan data ke database
$sql = "INSERT INTO keluhan (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql) === TRUE) {
    echo '<div class="sent-message">Pesan Anda telah terkirim dan disimpan ke database. Terima kasih!</div>';
} else {
    echo '<div class="error-message">Terjadi kesalahan. Silakan coba lagi nanti.</div>';
}

// Tutup koneksi database
$conn->close();
?>