<?php
// Memulai sesi
session_start();
// Membuat report kalau Error
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Mengambil dan Mengisi value ke JSON
$dataFile = 'data/data.json';
$data = json_decode(file_get_contents($dataFile), true);

// Menghitung kolom Pajak dan Total Harga Tiket
$dataPajakAsal = [
    "Soekarno-Hatta (CGK)" => 50000,
    "Husein Sastranegara (BDO)" => 30000,
    "Abdul Rachman Saleh (MLG)" => 40000,
    "Juanda (SUB)" => 40000
];

$dataPajakTujuan = [
    "Ngurah Rai (DPS)" => 80000,
    "Hasanuddin (UPG)" => 70000,
    "Inanwatan (INX)" => 90000,
    "Sultan Iskandarmuda (BTJ)" => 70000
];

// Check if form is submitted
$displayRoutesTable = isset($_POST['submit']);

// Get user inputs from POST data
$selectedMaskapai = $_POST['maskapai'] ?? '';
$selectedBandaraAsal = $_POST['bandara_asal'] ?? '';
$selectedBandaraTujuan = $_POST['bandara_tujuan'] ?? '';
$selectedHargaTiket = $_POST['harga_tiket'] ?? '';

// Add a new row to the table when the Submit button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedMaskapai = $_POST['maskapai'] ?? '';
    $selectedBandaraAsal = $_POST['bandara_asal'] ?? '';
    $selectedBandaraTujuan = $_POST['bandara_tujuan'] ?? '';
    $selectedHargaTiket = $_POST['harga_tiket'] ?? '';

    $pajakAsal = $dataPajakAsal[$selectedBandaraAsal];
    $pajakTujuan = $dataPajakTujuan[$selectedBandaraTujuan];
    $totalPajak = $pajakAsal + $pajakTujuan;
    $totalHargaTiket = $selectedHargaTiket + $totalPajak;

    $newRow = [
        $selectedMaskapai,
        $selectedBandaraAsal,
        $selectedBandaraTujuan,
        $selectedHargaTiket,
        $totalPajak,
        $totalHargaTiket
    ];

    // Save the new data to the JSON file
    $data[] = $newRow;
    file_put_contents($dataFile, json_encode($data, JSON_PRETTY_PRINT));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Rute Penerbangan</title>
    <link rel="stylesheet" href="library/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">Pendaftaran Rute Penerbangan</h1>
        <form action="index.php" method="post">
            <!-- Masing2 input bersifat Selection dan data Unique setelah di klik button submit akan menyimpan data inputan -->
            <div class="form-group">
                <label for="maskapai">Maskapai:</label>
                <select class="form-control" id="maskapai" name="maskapai" required>
                    <option value="">-- Semua Maskapai --</option>
                    <?php
                    $uniqueMaskapaiValues = array_unique(array_column($data, 0));
                    foreach ($uniqueMaskapaiValues as $maskapaiValue) : ?>
                        <option value="<?php echo $maskapaiValue; ?>" <?php echo ($selectedMaskapai === $maskapaiValue) ? 'selected' : ''; ?>><?php echo $maskapaiValue; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="bandara_asal">Bandara Asal:</label>
                <select class="form-control" id="bandara_asal" name="bandara_asal" required>
                    <option value="">-- Semua Bandara Asal --</option>
                    <?php
                    $uniqueBandaraAsalValues = array_unique(array_column($data, 1));
                    foreach ($uniqueBandaraAsalValues as $bandaraAsalValue) : ?>
                        <option value="<?php echo $bandaraAsalValue; ?>" <?php echo ($selectedBandaraAsal === $bandaraAsalValue) ? 'selected' : ''; ?>><?php echo $bandaraAsalValue; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="bandara_tujuan">Bandara Tujuan:</label>
                <select class="form-control" id="bandara_tujuan" name="bandara_tujuan" required>
                    <option value="">-- Semua Bandara Tujuan --</option>
                    <?php
                    $uniqueBandaraTujuanValues = array_unique(array_column($data, 2));
                    foreach ($uniqueBandaraTujuanValues as $bandaraTujuanValue) : ?>
                        <option value="<?php echo $bandaraTujuanValue; ?>" <?php echo ($selectedBandaraTujuan === $bandaraTujuanValue) ? 'selected' : ''; ?>><?php echo $bandaraTujuanValue; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="harga_tiket">Harga Tiket:</label>
                <select class="form-control" id="harga_tiket" name="harga_tiket" required>
                    <option value="">-- Pilih Harga Tiket --</option>
                    <?php
                    $uniqueHargaTiketValues = array_unique(array_column($data, 3));
                    sort($uniqueHargaTiketValues); // Sort the values
                    foreach ($uniqueHargaTiketValues as $hargaTiketValue) : ?>
                        <option value="<?php echo $hargaTiketValue; ?>" <?php echo ($selectedHargaTiket === $hargaTiketValue) ? 'selected' : ''; ?>><?php echo $hargaTiketValue; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success btn-block" name="submit">Submit</button>
        </form>

        <h2 class="text-center mt-5">Daftar Rute Tersedia</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Maskapai</th>
                    <th>Bandara Asal</th>
                    <th>Bandara Tujuan</th>
                    <th>Harga Tiket</th>
                    <th>Pajak</th>
                    <th>Total Harga Tiket</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;

                // menjalankan tugas no 6. Data yang baru saja diinputkan, akan tampil berdasarkan urutan abjad pada table Daftar Rute Tersedia (sort)
                usort($data, function ($a, $b) {
                    return strcmp($a[0], $b[0]);
                });

                foreach ($data as $row) : ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                        <td><?php echo $row[5]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
