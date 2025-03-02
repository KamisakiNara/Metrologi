<?php
include "koneksi.php";
require('./fpdf/fpdf.php');

date_default_timezone_set('Asia/Jakarta');

class PDF extends FPDF
{
    function Header()
    {
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(0, 10, 'Data Timbangan Massa', 0, 1, 'C');
        $this->Ln(10);gi
        
        $currentTime = date('Y-m-d H:i:s');
        $this->SetFont('Courier', 'I', 10);
        $this->Cell(0, 10, 'Dibuat pada: ' . $currentTime, 0, 1, 'R');
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Halaman ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4');

$pdf->SetXY(10, 40);
$pdf->SetFont('Courier', 'B', 12);

$pdf->Cell(50, 10, 'Nama', 1, 0, 'C');
$pdf->Cell(50, 10, 'Alamat', 1, 0, 'C');
$pdf->Cell(40, 10, 'Telepon', 1, 0, 'C');
$pdf->Cell(40, 10, 'Timbangan', 1, 0, 'C');
$pdf->Cell(40, 10, 'Merk', 1, 0, 'C');
$pdf->Cell(40, 10, 'Model', 1, 0, 'C');
$pdf->Cell(40, 10, 'Seri', 1, 0, 'C');
$pdf->Cell(40, 10, 'Kapasitas', 1, 1, 'C');

$sql = $pdo->prepare("SELECT * FROM massa ORDER BY nama");
$sql->execute();

$pdf->SetFont('Courier', '', 12);
while ($data = $sql->fetch()) {
    $pdf->Cell(50, 10, $data['nama'], 1, 0, 'C');
    $pdf->Cell(50, 10, $data['alamat'], 1, 0, 'C');
    $pdf->Cell(40, 10, $data['telp'], 1, 0, 'C');
    $pdf->Cell(40, 10, $data['timbangan'], 1, 0, 'C');
    $pdf->Cell(40, 10, $data['merk'], 1, 0, 'C');
    $pdf->Cell(40, 10, $data['model'], 1, 0, 'C');
    $pdf->Cell(40, 10, $data['seri'], 1, 0, 'C');
    $pdf->Cell(40, 10, $data['kapasitas'], 1, 1, 'C');
}

$filename = 'Data_Timbangan_Massa.pdf';
$pdf->Output($filename, 'D');