<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Data Registrasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body>

    <?php
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "nama_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Siapkan dan jalankan kueri SQL untuk mendapatkan data pengguna
    $sql = "SELECT * FROM Pengguna";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID_Pengguna</th><th>Nama_Pengguna</th><th>NIK</th><th>No_Whatsapp</th><th>Alamat</th></tr>";

        // Output data dari setiap baris
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["ID_pengguna"] . "</td>";
            echo "<td>" . $row["Nama_Pengguna"] . "</td>";
            echo "<td>" . $row["NIK"] . "</td>";
            echo "<td>" . $row["No_Whatsapp"] . "</td>";
            echo "<td>" . $row["Alamat"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Tidak ada data pengguna.";
    }

    // Tutup koneksi
    $conn->close();
    ?>

</body>

</html>