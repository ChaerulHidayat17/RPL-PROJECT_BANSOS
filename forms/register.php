<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulir Pendaftaran</title>
	<link rel="stylesheet" href="style.css"> <!-- Jika Anda memiliki file CSS terpisah -->
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f4f4f4;
			margin: 0;
			padding: 0;
			display: flex;
			align-items: center;
			justify-content: center;
			height: 100vh;
		}

		.container {
			background-color: #fff;
			border-radius: 8px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
			padding: 20px;
			width: 300px;
		}

		h2 {
			text-align: center;
		}

		form {
			display: flex;
			flex-direction: column;
		}

		label {
			margin-bottom: 8px;
		}

		input {
			padding: 8px;
			margin-bottom: 16px;
			border: 1px solid #ccc;
			border-radius: 4px;
		}

		button {
			background-color: #007bff;
			color: #fff;
			padding: 10px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #0056b3;
		}
	</style>
</head>

<body>
	<div class="container">
		<h2>Formulir Pendaftaran</h2>
		<form action="proses.php" method="post">
			<label for="nama">Nama Pengguna:</label>
			<input type="text" name="nama_pengguna" required><br>

			<label for="nik">NIK:</label>
			<input type="number" name="nik" required><br>

			<label for="no_whatsapp">No Whatsapp:</label>
			<input type="text" name="no_whatsapp" required /><br>

			<label for="alamat">Alamat:</label>
			<input type="text" name="alamat" required><br>

			<label for="gaji">Masukan Gaji Anda:</label>
			<input type="number" name="gaji" required><br>

			<button type="submit">Daftar</button>
		</form>
	</div>
</body>

</html>