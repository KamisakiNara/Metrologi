<?php
// Load file koneksi.php
include "koneksi.php";

// Ambil data dari database
$sql = $pdo->prepare("SELECT * FROM massa");
$sql->execute();
$data = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Timbangan Massa</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-center">Data Timbangan Massa</h2>
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Timbangan</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Seri</th>
                    <th>Kapasitas</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach ($data as $row): ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($row['nama']); ?></td>
                    <td><?= htmlspecialchars($row['alamat']); ?></td>
                    <td><?= htmlspecialchars($row['telp']); ?></td>
                    <td><?= htmlspecialchars($row['timbangan']); ?></td>
                    <td><?= htmlspecialchars($row['merk']); ?></td>
                    <td><?= htmlspecialchars($row['model']); ?></td>
                    <td><?= htmlspecialchars($row['seri']); ?></td>
                    <td><?= htmlspecialchars($row['kapasitas']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
