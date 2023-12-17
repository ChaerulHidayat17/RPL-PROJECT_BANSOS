<?php
$servername = "localhost";  // Ganti dengan nama server Anda
$username = "root";         // Ganti dengan nama pengguna database Anda
$password = "";             // Ganti dengan kata sandi database Anda
$dbname = "bantuan-sosial";   // Ganti dengan nama database Anda

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tampilkan tombol/link
echo '<a href="/Bansos/Admin/index.php" class="btn btn-primary" style="position: fixed; top: 10px; left: 10px;">Kembali ke Admin</a>';

// Ambil data dari database
$sql = "SELECT * FROM feedback";  // Ganti "nama_tabel" dengan nama tabel yang sesuai
$result = $conn->query($sql);

// Tampilkan data jika ada
if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>User Phone</th>
                <th>User Message</th>
            </tr>";

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

    echo "</table>";
} else {
    echo "Tidak ada data.";
}

// Tutup koneksi
$conn->close();
?>