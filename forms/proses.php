<?php
// proses.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data formulir
    $nama_pengguna = htmlspecialchars($_POST["nama_pengguna"]);
    $nik = htmlspecialchars($_POST["nik"]);
    $no_whatsapp = htmlspecialchars($_POST["no_whatsapp"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash password

    // Ganti bagian berikut dengan koneksi dan logika penambahan data ke database Anda
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

    // Masukkan data ke dalam database
    $sql = "INSERT INTO pengguna (Nama_Pengguna, NIK, No_Whatsapp, Alamat, Password) VALUES ('$nama_pengguna', '$nik', '$no_whatsapp', '$alamat', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo '<div style="background-color: #4CAF50; color: #fff; padding: 10px; text-align: center; border-radius: 5px;  font-size: 40px;">Selamat! Anda Telah Berhasil Terdaftar Sebagai Penerima Bantuan Sosial <br><br>
        Tunggu Notifikasi Di Whatsapp Anda Untuk Pemberitahuan Bantun Sosial Turun</div>';
    } else {
        echo '<div style="background-color: #f44336; color: #fff; padding: 10px; text-align: center; border-radius: 5px;">Error: ' . $sql . '<br>' . $conn->error . '</div>';
    }


    $conn->close();
} else {
    // Tangani kasus ketika formulir tidak dikirim melalui POST
    echo "Permintaan tidak valid!";
}
?>