<?php

// Parameter koneksi ke database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "bansos";

// Membuat koneksi ke database
$conn = new mysqli($hostname, $username, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil nomor telepon dari database
$sql = "SELECT No_Whatsapp FROM pengguna";
$result = $conn->query($sql);

// Memeriksa apakah query berhasil
if ($result) {
    $nomorTelepon = array();

    // Mengambil nomor telepon dan menambahkannya ke dalam array
    while ($row = $result->fetch_assoc()) {
        $nomorTelepon[] = $row['No_Whatsapp'];
    }

    // Menutup koneksi database
    $conn->close();

    // Menyiapkan permintaan cURL dengan nomor telepon
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
            'target' => implode(',', $nomorTelepon),
            'message' => 'Pengumuman Penting: Penyaluran  Bantuan Sosial

            Kami dengan senang hati mengumumkan bahwa program bantuan sosial akan diselenggarakan pada:
            
            Tanggal: [20 Maret 2024]
            
            Hari: [Minggu]
            
            Jam: [09:00 - 15:00]
            
            Lokasi: [Kantor Desa Konoha]',
            'delay' => '10',

        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: ccpRW57aqKEpBNKSNa#m'
        ),
    ));

    $response = curl_exec($curl);
    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }

    curl_close($curl);

    if (isset($error_msg)) {
        echo $error_msg;
    }

    echo $response;
} else {
    echo "Error dalam query database: " . $conn->error;
}

?>