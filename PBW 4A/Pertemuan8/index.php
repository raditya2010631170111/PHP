<!DOCTYPE html>
<html>
<head>
	<title>Aplikasi Penghitung BMI</title>
	<style>
		body {
			font-size: 36px;
			padding: 10px;
		}
		form > * {
			margin-bottom: 25px;
		}
		input[type="text"] {
			font-size: 36px;
			height: 35px;
			padding: 8px;
			border: 2px solid black;
			border-radius: 7px;
		}
		input[type="submit"] {
			font-size: 36px;
			height: 50px;
			padding: 8px;
			border: 2px solid black;
			border-radius: 7px;
		}
		.result strong {
			font-size: 48px;
		}
	</style>
</head>
<body>
	<h1>Aplikasi Penghitung BMI</h1>
	<form method="post">
		<label for="weight">Berat Badan (kg):</label>
		<input type="text" name="weight" id="weight" step="0.1" min="0" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo htmlspecialchars($_POST["weight"]); } ?>" required><br>
		<label for="height">Tinggi Badan (cm):</label>
		<input type="text" name="height" id="height" step="0.1" min="0" value="<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo htmlspecialchars($_POST["height"]); } ?>" required><br>
		<input style="height: 60px;" type="submit" value="Hitung BMI">
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$weight = (float) $_POST["weight"];
		$height = (float) $_POST["height"];
		$bmi = $weight / pow($height / 100, 2);
		$bmi = number_format($bmi, 2, '.', '');

		if ($bmi < 18.5) {
			$category = "Kekurangan berat badan"; //Underweight
		} elseif ($bmi >= 18.5 && $bmi <= 24.9) {
			$category = "Normal"; //Normal weight //80 190 = 22.16
		} elseif ($bmi >= 25.0 && $bmi <= 29.9) {
			$category = "Gemuk"; //Overweight //76 167 = 27.25
		} elseif ($bmi >= 30.0) {
			$category = "Obesitas"; //Obese
		}

		echo "<p><strong>Hasil Perhitungan:</strong></p>";
		echo "<p>Berat Badan: <strong>$weight</strong><br>";
		echo "Tinggi Badan: <strong>$height</strong><br>";
		echo "BMI: <strong>$bmi</strong><br>";
		echo "Kategori BMI: <strong>$category</strong></p>";
	}
	?>
</body>
</html>