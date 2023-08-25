<?php
	//	Instruksi Kerja Nomor 1.
	// Baris komentar: ....
	function hitung_tagihan_awal(){
	}

	//	Instruksi Kerja Nomor 2.
	//	Variabel lokasi berisi data kota lokasi restoran dalam bentuk array.
	$lokasi = ['Jakarta','Bogor','Depok','Tangerang','Bekasi'];

	//	Instruksi Kerja Nomor 4.
	//	Variabel untuk menyimpan harga satuan bento cake.
	$hargaSatuan = 90000;

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Form Pemesanan Bento Cake</title>
		<!-- Instruksi Kerja Nomor 5. -->
		<!-- Menghubungkan dengan library/berkas CSS. -->
		<link rel="stylesheet" href="library/bootstrap.css">

	</head>
	
	<body>
	<div class="container border">
		<!-- Menampilkan judul halaman -->
		<h3>Form Pemesanan Bento Cake</h3>
		
		<!-- Instruksi Kerja Nomor 6. -->
		<!-- Menampilkan logo restoran -->
		<img src="gambar/gambar.png" width="150" height="150" />

		
		<!-- Form untuk memasukkan data pemesanan. -->
		<form action="index.php" method="post" id="formPemesanan">
			<div class="row">
				<!-- Masukan data nama pelanggan. Tipe data text. -->
				<div class="col-lg-2"><label for="nama">Nama Pelanggan:</label></div>
				<div class="col-lg-2"><input type="text" id="nama" name="nama"></div>
			</div>
			<div class="row">
				<!-- Masukan data nomor HP pelanggan. Tipe data number. -->
				<div class="col-lg-2"><label for="nomor">Nomor HP:</label></div>
				<div class="col-lg-2"><input type="text" id="noHP" name="noHP" maxlength="16"></div>
			</div>
			<div class="row">
				<!-- Masukan data jumlah pesanan. Tipe data number. -->
				<div class="col-lg-2"><label for="nomor">Jumlah Pesanan:</label></div>
				<div class="col-lg-2"><input type="number" id="jumlahPesanan" name="jumlahPesanan" maxlength="4"></div>
			</div>
			<div class="row">
				<!-- Masukan pilihan lokasi lokasi resto. -->
				<div class="col-lg-2"><label for="tipe">Lokasi Pengiriman:</label></div>
				<div class="col-lg-2">
					<select id="lokasi" name="lokasi">
					<option value="">- Pilih lokasi -</option>
					<?php
						//	Instruksi Kerja Nomor 7.
						//	Menampilkan dropdown pilihan daerah pengiriman berdasarkan data pada array lokasi menggunakan perulangan.
						foreach($lokasi as $datalokasi){ ?>
					      <option value="<?php echo $datalokasi; ?>"> <?php echo $datalokasi; ?> </option>
					      <?php } 
					?>	
					</select>
				</div>
			</div>
			<div class="row">
				<!-- Tombol Submit -->
				<div class="col-lg-2"><button class="btn btn-primary" type="submit" form="formPemesanan" value="Pesan" name="Pesan">Pesan</button></div>
				<div class="col-lg-2"></div>			
			</div>
		</form>
	</div>
	<?php
		//	Kode berikut dieksekusi setelah tombol Hitung ditekan.
		if(isset($_POST['Pesan'])) {
			//	Variabel $dataPesanan berisi data-data pemesanan dari form dalam bentuk array.
			$dataPesanan = array(
				$nama = $_POST['nama'],
			    $noHP = $_POST['noHP'],
			    $jumlahPesanan = $_POST['jumlahPesanan'],
			    $lokasi = $_POST['lokasi']
			);

			//	Variabel $tagihanAwal berisi nilai tagihan awal (sebelum ongkir) yang dihitung dengan menggunakan fungsi hitung_tagihan_awal().
			// $tagihanAwal = hitung_tagihan_awal($dataPesanan['jumlahPesanan'], $hargaSatuan);
			$jumlah = 0;
            $tagihanAwal = $hargaSatuan * $jumlah;

			//	Instruksi Kerja Nomor 9.
			//	Menghitung ongkos kirim berdasarkan lokasi dengan kontrol percabangan.
			$ongkir = [
		        'Jakarta' => 0,
		        'Bogor' => 10000,
		        'Depok' => 0,
		        'Tangerang' => 5000,
		        'Bekasi' => 0
		    ];
		    $lamasewa = 0;

			// Instruksi Kerja Nomor 10.
			//	Variabel $totalTagihan berisi nilai total tagihan yang didapat dari nilai tagihan awal ditambah ongkir.
			$hargaOngkir = isset($ongkir[$lokasi]) ? $ongkir[$lokasi] * $lamasewa : 0;
			$totalTagihan = $hargaOngkir + $tagihanAwal;
			
			//	Variabel berisi path file data.json yang digunakan untuk menyimpan data pemesanan.
			$berkas = "data.json";
			
			//	Mengubah data pemesanan yang berbentuk array PHP menjadi bentuk JSON.
			$dataJson = file_get_contents($berkas);

			//	Mengubah data pemesanan dalam format JSON ke dalam format array PHP.
			$dataPesanan = json_decode($dataJson, true);
		    $dataPesanan [] = array(
		        'nama'     => $nama,
		        'noHP'   => $noHP,
		        'jumlahPesanan' => $jumlahPesanan,
		        'lokasi' => $lokasi,
		        'tagihanAwal' => $tagihanAwal,
		        'ongkir' => $ongkir,
		        'totalTagihan' => $totalTagihan
		    );
			
			//	Instruksi Kerja Nomor 8.
			//	Menyimpan dan membaca data pemesanan yang berbentuk JSON
			$dataJson = json_encode($dataPesanan, JSON_PRETTY_PRINT);
			file_put_contents($berkas, $dataJson);

			//	Instruksi Kerja Nomor 3.
			//	Mengurutkan array lokasi sesuai abjad A-Z.
			usort($dataPesanan, function ($a, $b) {
		     return strcmp($a['nama'], $b['nama']);
			});
			
			//	Menampilkan data pemesanan dan hasil perhitungan diskon dan tagihan.
			foreach ($dataPesanan as $ddataPesanan) {
			echo "
				<br/>
				<div class='container'>
					<div class='row'>
						<!-- Menampilkan nama pelanggan. -->
						<div class='col-lg-2'>Nama Pelanggan:</div>
						<div class='col-lg-2'>".$dataPesanan['nama']."</div>
					</div>
					<div class='row'>
						<!-- Menampilkan nomor HP pelanggan. -->
						<div class='col-lg-2'>Nomor HP:</div>
						<div class='col-lg-2'>".$dataPesanan['noHP']."</div>
					</div>
					<div class='row'>
						<!-- Menampilkan jumlah kotak pesanan. -->
						<div class='col-lg-2'>Jumlah Pesanan:</div>
						<div class='col-lg-2'>".$dataPesanan['jumlahPesanan']." box</div>
					</div>
					<div class='row'>
						<!-- Menampilkan lokasi lokasi restoran. -->
						<div class='col-lg-2'>Lokasi Pengiriman:</div>
						<div class='col-lg-2'>".$dataPesanan['lokasi']."</div>
					</div>
					<div class='row'>
						<!-- Menampilkan tagihan awal (sebelum diskon). -->
						<div class='col-lg-2'>Tagihan Awal:</div>
						<div class='col-lg-2'>Rp".number_format($tagihanAwal, 0, ".", ".").",-</div>
					</div>
					<div class='row'>
						<!-- Menampilkan tarif pemesanan. -->
						<div class='col-lg-2'>Ongkos Kirim:</div>
						<div class='col-lg-2'>Rp".number_format($ongkir, 0, ".", ".").",-</div>
					</div>
					<div class='row'>
						<!-- Menampilkan tagihan akhir (setelah diskon). -->
						<div class='col-lg-2'>Total Tagihan:</div>
						<div class='col-lg-2'>Rp".number_format($totalTagihan, 0, ".", ".").",-</div>
					</div>
			</div>
			";
			}
		}
	?>
	</body>
</html>