<?php
// Konfigurasi koneksi database
$host = "localhost";
$username = "root";
$password = "";
$database = "bantuan-sosial";

$conn = new mysqli($host, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Mengambil data dari database
$sql = "SELECT * FROM feedback";
$result = $conn->query($sql);

// Menampilkan data dengan gaya CSS inline
if ($result->num_rows > 0) {
    echo "<style>
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
            background-color: #f2f2f2;
        }
    </style>";

    echo "<table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Created At</th>
        </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['user_name']}</td>
            <td>{$row['user_email']}</td>
            <td>{$row['user_phone']}</td>
            <td>{$row['user_message']}</td>
            <td>{$row['created_at']}</td>
        </tr>";
    }

    echo "</table>";
} else {
    echo "Tidak ada data dalam database.";
}

// Menutup koneksi database
$conn->close();
?>