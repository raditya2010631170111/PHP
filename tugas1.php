<?php
$nama = "Raditya Aji Sasmoyo"; 
$sekolah = "SMAN 1 Campaka"; 
$no_wa = "081290264815"; //int can't start with 0-
$alamat = "Kp. Ulekan No. 92 RT/RW: 001/003, Sukaharja, Telukjambe Timur, Karawang, Jawa Barat";
$alasan = "Memperdalam ilmu PHP";

echo "<div style='max-width: 800px;margin: 0 auto;padding: 20px;background-color: white;border-radius: 5px;box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);'>";
echo "<h1>Biodata Mahasiswa</h1>";
echo "<p>Nama : $nama</p>";
echo "<p>Sekolah/Lulusan : $sekolah</p>";
echo "<p>No WA : $no_wa</p>";
echo "<p>Alamat : $alamat</p>";
echo "<p>Alasan Mengikuti Pelatihan : $alasan</p>";
echo "</div>";
?>