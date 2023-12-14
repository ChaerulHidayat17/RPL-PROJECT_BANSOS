<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bantuan-sosial";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mendapatkan data dari database
$sql = "SELECT * FROM keluhan";
$result = $conn->query($sql);

// Cek apakah ada data
if ($result->num_rows > 0) {
    // Output data dari setiap baris
    echo "<html><head><style>
        table {
            font-family: Arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style></head><body>";

    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th><th>Created At</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["subject"] . "</td><td>" . $row["message"] . "</td><td>" . $row["created_at"] . "</td></tr>";
    }

    echo "</table></body></html>";
} else {
    echo "Tidak ada data.";
}

// Tutup koneksi database
$conn->close();
?>