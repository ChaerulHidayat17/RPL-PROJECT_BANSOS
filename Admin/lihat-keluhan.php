<?php
$servername = "localhost";  // Ganti dengan nama server Anda
$username = "root";         // Ganti dengan nama pengguna database Anda
$password = "";             // Ganti dengan kata sandi database Anda
$dbname = "bantuan-sosial"; // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tampilkan tombol/link


// Ambil data dari database
$sql = "SELECT * FROM feedback"; // Ganti "nama_tabel" dengan nama tabel yang sesuai
$result = $conn->query($sql);

// Tampilkan data jika ada
if ($result->num_rows > 0) {
    echo "<table class='table table-bordered table-striped'>
            <thead class='thead-dark'>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Phone</th>
                    <th>User Message</th>
                </tr>
            </thead>
            <tbody>";

    // Output data dari setiap baris
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["user_name"] . "</td>
                <td>" . $row["user_email"] . "</td>
                <td>" . $row["user_phone"] . "</td>
                <td>" . $row["user_message"] . "</td>
            </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<p class='text-center mt-3'>Tidak ada data.</p>";
}

// Tutup koneksi
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <a href="/Bansos/Admin/index.php" class="btn btn-primary">Kembali Ke Admin</a>

</body>

</html>