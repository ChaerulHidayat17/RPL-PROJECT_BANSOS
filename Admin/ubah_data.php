<?php
// ubah_data.php

// Ganti bagian berikut dengan koneksi dan logika pengubahan data dari database Anda
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "bantuan-sosial";

// Buat koneksi
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah form telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data formulir yang diubah
    $id_pengguna = $_POST["id_pengguna"];
    $nama_pengguna_baru = htmlspecialchars($_POST["nama_pengguna_baru"]);
    $alamat_baru = htmlspecialchars($_POST["alamat_baru"]);
    $no_whatsapp_baru = htmlspecialchars($_POST["no_whatsapp_baru"]);

    // Update data dalam database
    $sql = "UPDATE user SET Nama_Pengguna='$nama_pengguna_baru', Alamat='$alamat_baru', No_Whatsapp='$no_whatsapp_baru' WHERE ID_Pengguna=$id_pengguna";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diubah!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ambil data dari database untuk ditampilkan pada formulir
// Ambil data dari database untuk ditampilkan pada formulir
if (isset($_GET["id"])) {
    $id_pengguna = $_GET["id"];

    $sql_select = "SELECT * FROM user WHERE ID_Pengguna=$id_pengguna";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        $row = $result_select->fetch_assoc();
        $nama_pengguna = $row["Nama_Pengguna"];
        $alamat = $row["Alamat"];
        $no_whatsapp = $row["No_Whatsapp"];
    } else {
        echo "<p>Data tidak ditemukan.</p>";
        echo '<a href="/Bansos/Admin/index.php" style="display: inline-block; padding: 10px 15px; background-color: #0056b3; color: #fff; text-decoration: none; border: 1px solid #004080; border-radius: 4px; transition: background-color 0.3s ease;">Kembali ke Halaman Utama</a>';
        exit();
    }
} else {
    echo "<p>ID Pengguna tidak diberikan.</p>";
    echo '<a href="/Bansos/Admin/index.php" style="display: inline-block; padding: 10px 15px; background-color: #0056b3; color: #fff; text-decoration: none; border: 1px solid #004080; border-radius: 4px; transition: background-color 0.3s ease;">Kembali ke Halaman Utama</a>';
    exit();
}




$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            font-weight: bold;
            color: #555;
        }

        input {
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #0056b3;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Formulir Ubah Data</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">

            <label for="nama_pengguna_baru">Nama Pengguna Baru:</label>
            <input type="text" name="nama_pengguna_baru" value="<?php echo $nama_pengguna; ?>">

            <label for="alamat_baru">Alamat Baru:</label>
            <input type="text" name="alamat_baru" value="<?php echo $alamat; ?>">

            <label for="no_whatsapp_baru">No Whatsapp Baru:</label>
            <input type="text" name="no_whatsapp_baru" value="<?php echo $no_whatsapp; ?>">

            <button type="submit">Simpan Perubahan</button>

        </form>
    </div>
</body>

</html>