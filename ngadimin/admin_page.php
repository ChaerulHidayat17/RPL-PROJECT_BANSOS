<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #007bff;
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }

        a:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">

        <h1>Selamat datang, Admin!</h1>

        <?php
        // Tautan ke lihat_data.php
        echo '<a href="lihat_data.php">Lihat Data</a>';

        // Tautan ke lihat-keluhan.php
        echo '<a href="lihat-keluhan.php">Lihat Keluhan</a>';
        ?>

    </div>

</body>

</html>