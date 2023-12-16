<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "bantuan-sosial";

$kon = mysqli_connect($host, $user, $password, $db);

if (!$kon) {
    die("koneksi gagal bro" . mysqli_connect_error());
} else {
    echo "Koneksi Lancar Bro";
}
?>