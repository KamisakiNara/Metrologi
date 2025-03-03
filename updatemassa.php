<?php
// Load file koneksi.php
include "koneksi.php";

// Periksa apakah ID tersedia di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Ambil data berdasarkan ID
    $sql = $pdo->prepare("SELECT * FROM massa WHERE id = :id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $data = $sql->fetch(PDO::FETCH_ASSOC);
    
    // Jika data tidak ditemukan, kembali ke halaman utama
    if (!$data) {
        echo "<script>alert('Data tidak ditemukan!'); window.location.href='read_data_massa.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href='read_data_massa.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Timbangan Massa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Update Data Timbangan Massa</h2>
        <form action="ubahmassa.php" method="POST" class="mt-3">
            <input type="hidden" name="id" value="<?= $data['id']; ?>">
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?= htmlspecialchars($data['alamat']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telepon</label>
                <input type="text" class="form-control" name="telp" value="<?= htmlspecialchars($data['telp']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Timbangan</label>
                <input type="text" class="form-control" name="timbangan" value="<?= htmlspecialchars($data['timbangan']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Merk</label>
                <input type="text" class="form-control" name="merk" value="<?= htmlspecialchars($data['merk']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Model</label>
                <input type="text" class="form-control" name="model" value="<?= htmlspecialchars($data['model']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Seri</label>
                <input type="text" class="form-control" name="seri" value="<?= htmlspecialchars($data['seri']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Kapasitas</label>
                <input type="number" class="form-control" name="kapasitas" value="<?= htmlspecialchars($data['kapasitas']); ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
            <a href="read_data_massa.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
