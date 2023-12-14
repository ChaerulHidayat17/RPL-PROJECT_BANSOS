<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Tentukan alamat email tujuan
    $to = "chaerulhidayat70@gmail.com";

    // Membuat pesan email
    $email_message = "Detail Pesan:\n\n";
    $email_message .= "Nama: " . $name . "\n";
    $email_message .= "Email: " . $email . "\n";
    $email_message .= "Subject: " . $subject . "\n";
    $email_message .= "Pesan:\n" . $message;

    // Mengatur header email
    $headers = "From: " . $email . "\r\n" .
        "Reply-To: " . $email . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    // Mengirim email
    if (mail($to, $subject, $email_message, $headers)) {
        // Jika berhasil mengirim
        echo "success";
    } else {
        // Jika gagal mengirim
        echo "error";
    }
} else {
    // Jika bukan metode POST, kirim status error
    http_response_code(403);
    echo "Forbidden";
}
?>