<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bansos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form login
$email = $_POST['email'];
$password = $_POST['password'];
$remember = isset($_POST['remember']) ? 1 : 0;

// Lindungi dari SQL Injection
$email = mysqli_real_escape_string($conn, $email);

// Query untuk mencari user berdasarkan email
$sql = "SELECT * FROM admin WHERE email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Verifikasi password
    if (password_verify($password, $row['password_hash'])) {
        // Login sukses
        // Sesuaikan tindakan yang diambil setelah login berhasil
        // Contoh: Redirect ke halaman admin
        header("Location: admin.html");
        exit(); // Pastikan untuk mengakhiri eksekusi skrip setelah mengarahkan pengguna
    } else {
        // Password salah, tambahkan pesan kesalahan
        echo '<script>alert("Password yang Anda masukkan salah.");</script>';
    }
} else {
    echo "User tidak ditemukan!";
}

// Tutup koneksi database
$conn->close();
?>