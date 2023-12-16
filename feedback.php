<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["send"])) {
    // Koneksi ke database
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "bantuan-sosial";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Ambil data formulir
    $user_name = $_POST["userName"];
    $user_email = $_POST["userEmail"];
    $user_phone = $_POST["userPhone"];
    $user_message = $_POST["userMessage"];

    // Simpan data ke dalam database
    $sql = "INSERT INTO feedback (user_name, user_email, user_phone, user_message) VALUES ('$user_name', '$user_email', '$user_phone', '$user_message')";

    if ($conn->query($sql) === TRUE) {
        echo '<div style="margin-top: 15px; padding: 10px; border-radius: 4px; font-weight: bold; background-color: #dff0d8; color: #3c763d; border: 1px solid #d6e9c6;">Pesan Anda telah terkirim. Terima kasih!</div>';
    } else {
        echo '<div style="margin-top: 15px; padding: 10px; border-radius: 4px; font-weight: bold; background-color: #f2dede; color: #a94442; border: 1px solid #ebccd1;">Maaf, pesan tidak dapat dikirim. Silakan coba lagi nanti.</div>';
    }


    // Tutup koneksi database
    $conn->close();
}
?>