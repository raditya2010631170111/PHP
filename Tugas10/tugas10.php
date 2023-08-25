<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama']; 
    $noHP = $_POST['noHP'];
    $jumlahPesanan = $_POST['jumlahPesanan'];
    $lokasi = $_POST['lokasi'];
    $hitung_tagihan_awal = $_POST['hitung_tagihan_awal'];
    $ongkir = $_POST['ongkir'];
    $totalTagihan = $_POST['totalTagihan'];

    //4. Buatlah sebuah variable untuk menyimpan harga satuan bento cake dengan nama variable hargaSatuan. Harga satuan bento cake adalah Rp 90.000,-
    $hargaSatuan = 90000;

    //menghitung isi var ongkir dari var lokasi
    //9. Tambahkan kontrol percabangan pada baris kode untuk menghitung harga ongkos kirim, dengan ketentuan:
    $ongkir = [
        'Jakarta' => 0,
        'Bogor' => 10000,
        'Depok' => 0,
        'Tangerang' => 5000,
        'Bekasi' => 0
    ];
    
    //1. Buatlah sebuah fungsi dengan nama hitung_tagihan_awal untuk menghitung tagihan pembelian.
    $hitung_tagihan_awal = $hargaSatuan * $jumlah;
    //10. Buatlah sebuah variable untuk menghitung Total Tagihan yang didapat dari nilai tagihan awal ditambah ongkos kirim.
    $lamasewa = 0;
    $hargaOngkir = isset($ongkir[$lokasi]) ? $ongkir[$lokasi] * $lamasewa : 0;
    $totalTagihan = $hargaOngkir + $tagihanAwal;

    // Load existing data from JSON file
    $jsonData = file_get_contents('data.json');
    $data = json_decode($jsonData, true);
    
    // Data 1
    $data [] = array(
        'nama'     => $nama,
        'noHP'   => $noHP,
        'jumlahPesanan' => $jumlahPesanan,
        'lokasi' => $lokasi,
        'hitung_tagihan_awal' => $hitung_tagihan_awal,
        'ongkir' => $ongkir,
        'totalTagihan' => $totalTagihan
    );

//8. Tambahkan baris kode untuk menyimpan dan membaca data pemesanan tersebut ke dalam file JSON yang sudah tersedia.
    // Mengencode data menjadi json
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    // Menyimpan data ke dalam anggota.json
    file_put_contents('data.json', $jsonfile);

}
?>

<!DOCTYPE html>
<html>
<style>
input[type=text],input[type=number], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  color : red;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
/* Dibawah ini adalah  Css Tabel   */
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

</style>
<head>
<!-- 5. Hubungkan halaman web tersebut dengan file library CSS yang sudah tersedia (dapat di download di link paling akhir). -->
  <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php
// 2. Buatlah sebuah array satu dimensi yang berisikan daftar jaungkauan daerah pesan antar sebagai berikut (sesuai urutan): Jakarta, Bogor, Depok, Tangerang dan Bekasi.
$lokasi = ['Jakarta','Bogor','Depok','Tangerang','Bekasi'];

?>
<h3>Form Pemesanan Bento Cake </h3>
<!-- 6. Tambahkan logo pada halaman tersebut dengan menggunakan file gambar logo yang sudah disediakan. Posisi logo adalah di bawah tulisan “Form Pemesanan Bento Cake”. -->
<img src="gambar/gambar.png" width="150" height="150" />

<div>
  <form action="tugas10.php" method="post">
    <label for="fname">Nama Pelanggan</label>
    <input type="text" id="fname" name="nama" placeholder="Nama..">

    <label for="lname">Nomor HP</label>
    <input type="text" id="lname" name="noHP" placeholder="No telp.." maxlength="16">

    <label for="jumlahPesanan">Jumlah Pesanan</label>
    <input type="number" id="jumlahPesanan" name="jumlahPesanan" placeholder="Lama Sewa.." maxlength="4">

<!-- 7. Tampilkan isi array pada instruksi kerja nomor 2 sebagai pilihan dalam bentuk dropdown lokasi antar pada form pemesanan dengan menggunakan kontrol perulangan. -->
    <label for="country">Lokasi Pengiriman</label>
    <select id="country" name="lokasi">
     <option value=""> - Pilih Lokasi Pengiriman -</option>
    <?php foreach($lokasi as $datalokasi){ ?>
      <option value="<?php echo $datalokasi; ?>"> <?php echo $datalokasi; ?> </option>
      <?php } ?>
    </select> 
 
    <input type="submit" value="Pesan" >
  </form>
</div>

<table id="customers">
  <tr>
    <th>Nama Pelanggan</th>
    <th>Nomor HP</th>
    <th>Jumlah Pesanan</th>
    <th>Lokasi Pengiriman</th>
    <th>Tagihan Awal</th>
    <th>Ongkos Kirim</th>
    <th>Harga Sewa</th>
  </tr>
 
 <?php
 // File json yang akan dibaca (full path file)
 $file = "data/data.json";
 
 // Mendapatkan file json
 $datakue = file_get_contents($file);
 
 // Mendecode anggota.json
 $data = json_decode($datakue, true);

 //3. Urutkan array pada instruksi sebelumnya menggunakan fungsi bawaan PHP. Urutkan secara ascending (dari A ke Z).
 // usort($data, function ($a, $b) {
 //     return strcmp($a['nama'], $b['nama']);
 // });
  
   // Membaca data array menggunakan foreach
 foreach ($data as $d) {
   ?>
  <tr>
    <td><?php echo $d['nama'] ?></td>
    <td><?php echo $d['noHP'] ?></td>
    <td><?php echo $d['jumlahPesanan'] ?></td>
    <td><?php echo $d['lokasi'] ?></td>
    <td><?php echo $d['hitung_tagihan_awal'] ?></td>
    <td><?php echo $d['ongkir'] ?></td>
    <td><?php echo $d['totalTagihan'] ?></td>
  </tr>
  <?php } ?>
  
</table>

</body>
</html>
