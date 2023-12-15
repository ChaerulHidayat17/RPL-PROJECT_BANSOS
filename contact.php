<?php
// Detail koneksi database
$host = "localhost";
$username = "root";
$password = "";
$database = "bantuan-sosial";

// Membuat koneksi database
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah formulir dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn-send"])) {
    // Mengumpulkan data formulir
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Memasukkan data ke dalam database
    $sql = "INSERT INTO keluhan (name, email, subject, message, created_at) VALUES ('$name', '$email', '$subject', '$message', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>';
    } else {
        echo '<div class="error-message">Error: ' . $conn->error . '</div>';
    }

    // Menutup koneksi database
    $conn->close();
}
?>