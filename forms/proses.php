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
    echo '<a href="register.php"><button style="margin-top: 15px; padding: 10px; border-radius: 4px; font-weight: bold; background-color: #337ab7; color: #fff; border: 1px solid #2e6da4; cursor: pointer;">Kembali ke Halaman Pendaftaran</button></a>';
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
        echo '<a href="register.php"><button style="margin-top: 15px; padding: 10px; border-radius: 4px; font-weight: bold; background-color: #337ab7; color: #fff; border: 1px solid #2e6da4; cursor: pointer;">Kembali ke Halaman Pendaftaran</button></a>';
    } else {
        echo '<p style="color: #dc3545; font-size: 28px; margin-bottom: 20px; padding: 15px; border: 2px solid #dc3545; border-radius: 8px; background-color: #f8d7da;">Maaf, Anda Gagal Mendaftar Di Program Bantuan Sosial</p>';
        echo '<p style="color: #dc3545; font-size: 18px;">Error: ' . $stmt->error . '</p>';
        echo '<a href="register.php"><button style="margin-top: 15px; padding: 10px; border-radius: 4px; font-weight: bold; background-color: #dc3545; color: #fff; border: 1px solid #dc3545; cursor: pointer;">Kembali ke Halaman Pendaftaran</button></a>';
    }




    // Tutup pernyataan
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>