<!DOCTYPE html>
<html>
<head>
    <style>
        .line {
            width: 100%;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
			padding: 1px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <form method="post">
        <label for="bilangan1">Bilangan 1:</label>
        <input type="number" id="bilangan1" name="bilangan1" required>
        <br>
        <label for="bilangan2">Bilangan 2:</label>
        <input type="number" id="bilangan2" name="bilangan2" required>
        <br>
        <input type="submit" value="Hitung">
        <br>
        <br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bilangan1 = $_POST["bilangan1"];
        $bilangan2 = $_POST["bilangan2"];

        $penjumlahan = $bilangan1 + $bilangan2;
        $pengurangan = $bilangan1 - $bilangan2;
        $perkalian = $bilangan1 * $bilangan2;
        $pembagian = $bilangan1 / $bilangan2;

        echo "Bilangan 1: $bilangan1<br>";
        echo "Bilangan 2: $bilangan2<br>";
        echo "<div class='line'></div>";
        echo "Hasil Penjumlahan: $penjumlahan<br>";
        echo "Hasil Pengurangan: $pengurangan<br>";
        echo "Hasil Perkalian: $perkalian<br>";
        echo "Hasil Pembagian: $pembagian<br>";
    }
    ?>
</body>
</html>