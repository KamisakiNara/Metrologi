<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil Data yang Dikirim dari Form
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$telp = $_POST['telp'];
$timbangan = $_POST['timbangan'];
$merk = $_POST['merk'];
$model = $_POST['model'];
$seri = $_POST['seri'];
$kapasitas = $_POST['kapasitas'];

// Proses simpan ke Database
$sql = $pdo->prepare("INSERT INTO massa(nama, alamat, telp, timbangan, merk, model, seri, kapasitas)
VALUES(:nama,:alamat,:telp,:timbangan,:merk,:model,:seri,:kapasitas)");
$sql->bindParam(':nama', $nama);
$sql->bindParam(':alamat', $alamat);
$sql->bindParam(':telp', $telp);
$sql->bindParam(':timbangan', $timbangan);
$sql->bindParam(':merk', $merk);
$sql->bindParam(':model', $model);
$sql->bindParam(':seri', $seri);
$sql->bindParam(':kapasitas', $kapasitas);
$sql->execute(); // Eksekusi query insert

if($sql){ // Cek jika proses simpan ke database sukses atau tidak
    // Jika Sukses, Lakukan :
    header("location: bacamassa.php"); // Redirect ke halaman index.php
} else {
    // Jika Gagal, Lakukan :
    echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
    echo "<br><a href='timbanganmassa.php'>Kembali Ke Form</a>";
}
?>
