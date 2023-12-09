<?php
// ubah_data.php

// Ganti bagian berikut dengan koneksi dan logika pengubahan data dari database Anda
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

// Periksa apakah form telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data formulir yang diubah
    $id_pengguna = $_POST["id_pengguna"];
    $nama_pengguna_baru = htmlspecialchars($_POST["nama_pengguna_baru"]);
    $alamat_baru = htmlspecialchars($_POST["alamat_baru"]);
    $no_whatsapp_baru = htmlspecialchars($_POST["no_whatsapp_baru"]);

    // Update data dalam database
    $sql = "UPDATE pengguna SET Nama_Pengguna='$nama_pengguna_baru', Alamat='$alamat_baru', No_Whatsapp='$no_whatsapp_baru' WHERE ID_Pengguna=$id_pengguna";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diubah!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Ambil data dari database untuk ditampilkan pada formulir
if (isset($_GET["id"])) {
    $id_pengguna = $_GET["id"];

    $sql_select = "SELECT * FROM pengguna WHERE ID_Pengguna=$id_pengguna";
    $result_select = $conn->query($sql_select);

    if ($result_select->num_rows > 0) {
        $row = $result_select->fetch_assoc();
        $nama_pengguna = $row["Nama_Pengguna"];
        $alamat = $row["Alamat"];
        $no_whatsapp = $row["No_Whatsapp"];
    } else {
        echo "Data tidak ditemukan.";
        exit();
    }
} else {
    echo "ID Pengguna tidak diberikan.";
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
    <link rel="stylesheet" href="style.css"> <!-- Jika Anda memiliki file CSS terpisah -->
</head>

<body>
    <div class="container">
        <h2>Formulir Ubah Data</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="hidden" name="id_pengguna" value="<?php echo $id_pengguna; ?>">

            <label for="nama_pengguna_baru">Nama Pengguna Baru:</label>
            <input type="text" name="nama_pengguna_baru" value="<?php echo $nama_pengguna; ?>"><br>

            <label for="alamat_baru">Alamat Baru:</label>
            <input type="text" name="alamat_baru" value="<?php echo $alamat; ?>"><br>

            <label for="no_whatsapp_baru">No Whatsapp Baru:</label>
            <input type="text" name="no_whatsapp_baru" value="<?php echo $no_whatsapp; ?>"><br>

            <button type="submit">Simpan Perubahan</button>
        </form>
    </div>
</body>

</html>