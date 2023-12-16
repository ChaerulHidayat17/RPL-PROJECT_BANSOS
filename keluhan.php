<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn-send"])) {
    // Ambil data formulir
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Proses formulir dan kirim ke Fonnte
    $fonnteApiUrl = 'https://api.fonnte.com/send';
    $fonnteApiToken = '4V3i6vgRcG_e9Gg8EJJq';

    $postData = array(
        'target' => '082113614887', // Ganti dengan nomor tujuan sesuai kebutuhan
        'message' => "Pesan dari $name\nEmail: $email\nSubject: $subject\n\n$message",
        'schedule' => '0', // Kirim segera
        'typing' => false,
        'delay' => '2',
        'countryCode' => '62', // Kode negara Indonesia
    );

    $ch = curl_init($fonnteApiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Authorization: ' . $fonnteApiToken,
    ));

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    // Periksa respons dari Fonnte
    if ($httpCode == 200) {
        echo '<div class="sent-message">Pesan Anda telah terkirim. Terima kasih!</div>';
    } else {
        echo '<div class="error-message">Error: Form submission failed. Please check your input and try again.</div>';
    }

}
?>