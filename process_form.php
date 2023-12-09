<?php
// process_form.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Display the submitted data
    echo "<p><strong>Nama:</strong> $name</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Subject:</strong> $subject</p>";
    echo "<p><strong>Pesan:</strong> $message</p>";

    // You can also store the data in a database or perform other actions as needed.
}
?>