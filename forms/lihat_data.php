<?php
// Ganti bagian berikut dengan koneksi dan logika penampilan data dari database Anda
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

// Ambil data dari database
$sql = "SELECT * FROM pengguna";
$result = $conn->query($sql);

// Tampilkan data dengan gaya yang lebih menarik
echo "<html>
<head>
<style>
    h2 {
        text-align: center;
        color: #007bff;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    td {
        word-wrap: break-word;
        max-width: 250px;
    }

    .ubah-btn,
    .hapus-btn {
        background-color: #28a745;
        color: #fff;
        padding: 8px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-right: 5px;
    }

    .ubah-btn:hover,
    .hapus-btn:hover {
        background-color: #218838;
    }
</style>
</head>
<body>";

echo "<h2>Data Penerima Bansos</h2>";
echo "<table>";
echo "<tr><th>ID_Pengguna</th><th>Nama_Pengguna</th><th>NIK</th><th>No_Whatsapp</th><th>Alamat</th><th>Password</th><th>Aksi</th></tr>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ID_Pengguna"] . "</td><td>" . $row["Nama_Pengguna"] . "</td><td>" . $row["NIK"] . "</td><td>" . $row["No_Whatsapp"] . "</td><td>" . $row["Alamat"] . "</td><td>" . $row["Password"] . "</td>";
        echo "<td><button class='ubah-btn' onclick='ubahData(" . $row["ID_Pengguna"] . ")'>Ubah</button>";
        echo "<button class='hapus-btn' onclick='hapusData(" . $row["ID_Pengguna"] . ")'>Hapus</button></td></tr>";
    }
} else {
    echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
}

echo "</table>";

echo "<script>
    function ubahData(id) {
        // Redirect atau tindakan lain untuk mengubah data berdasarkan ID
        window.location.href = 'ubah_data.php?id=' + id;
    }

    function hapusData(id) {
        // Tanyakan konfirmasi sebelum menghapus data
        var konfirmasi = confirm('Apakah Anda yakin ingin menghapus data ini?');

        if (konfirmasi) {
            // Tindakan hapus jika konfirmasi diterima
            window.location.href = 'hapus_data.php?id=' + id;
        }
    }
</script>";

echo "</body></html>";

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data</title>
</head>
<style>
    h1 {
        text-align: center;
        color: #007bff;
    }
</style>

<body>
    <h1>Kirim Notifikasi Bantuan Sosial</h1>
    <form action="http://localhost/Bansos/api.php">
        <button type="submit">Click me</button>
    </form>
</body>

</html>