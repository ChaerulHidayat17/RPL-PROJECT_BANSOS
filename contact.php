<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Lakukan sesuatu dengan data yang diambil, misalnya menyimpan ke database atau mengirimkan email

    // Contoh: Menampilkan data yang diinput
    $response = array(
        'status' => 'success',
        'message' => 'Pesan Anda telah terkirim. Terima kasih!',
        'data' => array(
            'nama' => $name,
            'email' => $email,
            'subject' => $subject,
            'message' => $message
        )
    );

    // Convert array to JSON
    echo json_encode($response);
} else {
    // Jika tidak ada data POST, tampilkan pesan kesalahan
    $response = array(
        'status' => 'error',
        'message' => 'Invalid request method.'
    );

    // Convert array to JSON
    echo json_encode($response);
}
?>