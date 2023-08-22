<!DOCTYPE html>
<html>
<body>
    <form method="post">
        <label for="angka">Jumlah Bintang=</label>
        <input type="number" id="angka" name="angka" required>
        <br>
        <input type="submit" value="kirim">
        <br>
        <br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $angka = $_POST["angka"];

        for ($i = 1; $i <= $angka; $i++) { //counted L. vs uncounted L.
            for ($j = 1; $j <= $i; $j++) {
                echo "*";
            }
            echo "<br>";
        }
    }
    ?>
</body>
</html>