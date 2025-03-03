<?php
// Load file koneksi.php
include "koneksi.php";

// Periksa apakah data dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $timbangan = $_POST['timbangan'];
    $merk = $_POST['merk'];
    $model = $_POST['model'];
    $seri = $_POST['seri'];
    $kapasitas = $_POST['kapasitas'];

    try {
        // Query update data
        $sql = $pdo->prepare("UPDATE massa SET 
                              nama = :nama, 
                              alamat = :alamat, 
                              telp = :telp, 
                              timbangan = :timbangan, 
                              merk = :merk, 
                              model = :model, 
                              seri = :seri, 
                              kapasitas = :kapasitas 
                              WHERE id = :id");
        
        // Bind parameters
        $sql->bindParam(':id', $id);
        $sql->bindParam(':nama', $nama);
        $sql->bindParam(':alamat', $alamat);
        $sql->bindParam(':telp', $telp);
        $sql->bindParam(':timbangan', $timbangan);
        $sql->bindParam(':merk', $merk);
        $sql->bindParam(':model', $model);
        $sql->bindParam(':seri', $seri);
        $sql->bindParam(':kapasitas', $kapasitas);
        
        // Eksekusi query
        if ($sql->execute()) {
            echo "<script>alert('Data berhasil diperbarui!'); window.location.href='bacamassa.php';</script>";
        } else {
            echo "<script>alert('Gagal memperbarui data!'); window.location.href='updatemassa.php?id=$id';</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<script>alert('Metode pengiriman tidak valid!'); window.location.href='bacamassa.php';</script>";
}
?>
