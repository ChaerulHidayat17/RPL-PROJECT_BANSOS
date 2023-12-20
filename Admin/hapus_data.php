<?php
$servername = "localhost";
$username = "root";
$password_db = "";
$dbname = "bantuan-sosial";

$conn = new mysqli($servername, $username, $password_db, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if (isset($_GET["id"])) {
    $id_pengguna = $_GET["id"];

    $sql = "DELETE FROM user WHERE ID_Pengguna=$id_pengguna";

    if ($conn->query($sql) === TRUE) {
        $message = "Data berhasil dihapus!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    $message = "ID Pengguna tidak diberikan.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dihapus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .message-container {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .success-message {
            font-size: 24px;
            color: green;
        }

        .error-message {
            font-size: 24px;
            color: red;
        }
    </style>
</head>

<body>
    <div class="message-container">
        <?php
        if (isset($message)) {
            if (strpos($message, "berhasil") !== false) {
                echo '<p class="success-message">' . $message . '</p>';
            } else {
                echo '<p class="error-message">' . $message . '</p>';
            }
        }
        ?>
        <a href="/Bansos/Admin/penerima.php" class="btn btn-primary mt-3">Kembali ke Daftar Penerima</a>
    </div>
</body>

</html>