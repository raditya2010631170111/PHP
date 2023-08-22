<?php
echo "===============CETAK BILANGAN GANJIL GENAP 1-100:===============<br>";

for ($i = 1; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        echo "$i adalah Bilangan Genap<br>";
    } else {
        echo "$i adalah Bilangan Ganjil.<br>";
    }
}
?>

<?php
$i = 1;
while ($i <= 100) {
    if ($i % 2 == 0) {
        echo "$i adalah Bilangan Genap<br>";
    } else {
        echo "$i adalah Bilangan Ganjil.<br>";
    }
    $i++;
}
?>