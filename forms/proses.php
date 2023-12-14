<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "bantuan-sosial";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tangkap data dari formulir
$nama_pengguna = isset($_POST['nama_pengguna']) ? htmlspecialchars($_POST['nama_pengguna']) : '';
$nik = isset($_POST['nik']) ? $_POST['nik'] : '';
$no_whatsapp = isset($_POST['no_whatsapp']) ? $_POST['no_whatsapp'] : '';
$alamat = isset($_POST['alamat']) ? htmlspecialchars($_POST['alamat']) : '';
$gaji = isset($_POST['gaji']) ? $_POST['gaji'] : '';

// Validasi NIK dan Gaji
if (!is_numeric($nik) || !is_numeric($gaji)) {
    echo "Error: NIK dan Gaji harus berupa angka.";
    exit;
}

// Periksa gaji
if ($gaji > 3000000) {
    echo '<p style="color: white; font-size: 40px; margin-bottom: 20px; padding: 15px; border: 2px solid #28a745; border-radius: 8px; background-color: red;">Pendaftaran gagal! Anda tidak termasuk penerima bantuan karena gaji Anda lebih dari 3000000</p>';
} else {
    // Siapkan dan jalankan kueri SQL untuk menyimpan data
    $sql = "INSERT INTO user (Nama_Pengguna, NIK, No_Whatsapp, Alamat, Gaji) VALUES (?, ?, ?, ?, ?)";

    // Siapkan pernyataan
    $stmt = $conn->prepare($sql);

    // Bind parameter ke pernyataan
    $stmt->bind_param("sssss", $nama_pengguna, $nik, $no_whatsapp, $alamat, $gaji);

    // Eksekusi pernyataan
    if ($stmt->execute()) {
        echo '<p style="color: #28a745; font-size: 28px; margin-bottom: 20px; padding: 15px; border: 2px solid #28a745; border-radius: 8px; background-color: #d4edda;">Selamat Anda Berhasil Mendaftar Di Program Bantuan Sosial</p>';

    } else {
        echo '<p style="color: #dc3545; font-size: 24px; margin-bottom: 20px;">Terjadi kesalahan saat mendaftar.<br>Silakan coba lagi nanti.</p>';
        echo '<p>Error: ' . $sql . '<br>' . $conn->error . '</p>';
    }

    // Tutup pernyataan
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>