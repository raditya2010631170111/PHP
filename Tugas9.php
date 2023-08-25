<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nmpenyewa = $_POST['nmpenyewa']; 
    $notelp = $_POST['notelp'];
    $kendaraan = $_POST['kendaraan'];
    $lamasewa = $_POST['lamasewa'];

    // Calculate the harga sewa based on jenis kendaraan and lama sewa
    $hargaPerHari = [
        'Avanza' => 150000,
        'Mobilio' => 175000,
        'Vios' => 200000,
        'Brio' => 160000
    ];
    
    $hargasewa = isset($hargaPerHari[$kendaraan]) ? $hargaPerHari[$kendaraan] * $lamasewa : 0;

    // Load existing data from JSON file
    $jsonData = file_get_contents('datasewa.json');
    $data = json_decode($jsonData, true);
    
    // Data 1
    $data [] = array(
        'nmpenyewa'     => $nmpenyewa,
        'notelp'   => $notelp,
        'kendaraan' => $kendaraan,
        'lamasewa' => $lamasewa,
        'hargasewa' => $hargasewa
    );

    // Mengencode data menjadi json
    $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
    // Menyimpan data ke dalam anggota.json
    file_put_contents('datasewa.json', $jsonfile);

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
<body>
<?php
$kendaraan = ['Avanza','Mobilio','Vios','Brio'];

?>
<h3>SEWA KENDARAAN </h3>

<div>
  <form action="index2.php" method="post">
    <label for="fname">Nama Penyewa</label>
    <input type="text" id="fname" name="nmpenyewa" placeholder="Nama..">

    <label for="lname">No Telp</label>
    <input type="text" id="lname" name="notelp" placeholder="No telp..">

    <label for="country">Kendaraan</label>
    <select id="country" name="kendaraan">
     <option value=""> - Pilih Jenis Kendaraan -</option>
    <?php foreach($kendaraan as $datakendaraan){ ?>
      <option value="<?php echo $datakendaraan; ?>"> <?php echo $datakendaraan; ?> </option>
      <?php } ?>
    </select> 
    <label for="lamasewa">Lama Sewa</label>
    <input type="number" id="lamasewa" name="lamasewa" placeholder="Lama Sewa..">
 
    <input type="submit" value="Submit" >
  </form>
</div>
<h1>A Fancy Table</h1>

<table id="customers">
  <tr>
    <th>Nama Penyewa</th>
    <th>No Tlp</th>
    <th>Jenis Kendaraan</th>
    <th>Lama Sewa</th>
    <th>Harga Sewa</th>
  </tr>
 
 <?php
 // File json yang akan dibaca (full path file)
 $file = "datasewa.json";
 
 // Mendapatkan file json
 $datasewa = file_get_contents($file);
 
 // Mendecode anggota.json
 $data = json_decode($datasewa, true);
  
   // Membaca data array menggunakan foreach
 foreach ($data as $d) {
   ?>
  <tr>
    <td><?php echo $d['nmpenyewa'] ?></td>
    <td><?php echo $d['notelp'] ?></td>
    <td><?php echo $d['kendaraan'] ?></td>
    <td><?php echo $d['lamasewa'] ?></td>
    <td><?php echo $d['hargasewa'] ?></td>
  </tr>
  <?php } ?>
  
</table>

</body>
</html>
