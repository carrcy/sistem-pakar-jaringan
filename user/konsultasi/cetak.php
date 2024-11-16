<?php
require_once '../helper/connection.php';
require_once '../../TCPDF/tcpdf.php'; // Pastikan path ini benar

// Pastikan idkonsultasi ada di URL
if (!isset($_GET['idkonsultasi']) || empty($_GET['idkonsultasi'])) {
    die('ID Konsultasi tidak ditemukan.');
}
$idkonsultasi = $_GET['idkonsultasi'];

// Query untuk mengambil data konsultasi termasuk nama user dan tanggal
$result = mysqli_query($connection, "
    SELECT 
        kosultasi.tanggal, 
        detail_masalah.idmasalah, 
        detail_masalah.persentase, 
        user.nama AS nama_user 
    FROM detail_masalah 
    INNER JOIN kosultasi ON detail_masalah.idkonsultasi = kosultasi.idkonsultasi 
    INNER JOIN user ON kosultasi.iduser = user.iduser
    WHERE kosultasi.idkonsultasi = '$idkonsultasi'
");

if (!$result) {
    die('Query failed: ' . mysqli_error($connection));
}

$data = mysqli_fetch_array($result);  

// Membuat objek TCPDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('NetSolver');
$pdf->SetTitle('Laporan Konsultasi');
$pdf->SetMargins(15, 15, 15);
$pdf->AddPage();

// Menambahkan Header
$pdf->SetFont('helvetica', '', 16); 
$pdf->Cell(0, 10, 'Laporan Konsultasi - NetSolver', 0, 1, 'C');
$pdf->Ln(10);

// Menampilkan Nama Pengguna dan Tanggal
$pdf->SetFont('helvetica', '', 12);  
$pdf->Cell(0, 10, 'Nama Pengguna: ' . $data['nama_user'], 0, 1);
$pdf->Cell(0, 10, 'Tanggal Konsultasi: ' . date("d F Y", strtotime($data['tanggal'])), 0, 1);
$pdf->Ln(5);

// Menambahkan Tabel untuk Masalah dan Solusi
$pdf->SetFont('helvetica', '', 12);  
$pdf->Cell(20, 10, 'No', 1, 0, 'C');
$pdf->Cell(50, 10, 'Masalah', 1, 0, 'C');
$pdf->Cell(30, 10, 'Persentase', 1, 0, 'C');
$pdf->Cell(80, 10, 'Solusi', 1, 1, 'C');

// Menampilkan Data Masalah dan Solusi
$no = 1;
do {
    // Ambil data masalah terkait
    $idmasalah = $data['idmasalah'];
    $result2 = mysqli_query($connection, "SELECT * FROM masalah WHERE idmasalah='$idmasalah'");
    if (!$result2) {
        die('Query failed: ' . mysqli_error($connection));
    }
    $data2 = mysqli_fetch_array($result2);

    $height_no = $pdf->GetStringHeight(20, $no);
    $height_masalah = $pdf->GetStringHeight(50, $data2['nmmasalah']);
    $height_persentase = $pdf->GetStringHeight(30, $data['persentase'] . '%');
    $height_solusi = $pdf->GetStringHeight(80, $data2['solusi']);

    $max_height = max($height_no, $height_masalah, $height_persentase, $height_solusi);

    $pdf->Cell(20, $max_height, $no++, 1, 0, 'L');

    $pdf->MultiCell(50, $max_height, $data2['nmmasalah'], 1, 'L', 0, 0);

    $pdf->MultiCell(30, $max_height, $data['persentase'] . '%', 1, 'L', 0, 0);

    $pdf->MultiCell(80, $max_height, $data2['solusi'], 1, 'L', 0, 1);

} while ($data = mysqli_fetch_array($result));

$pdf->Output('Laporan_Konsultasi_' . $idkonsultasi . '.pdf', 'I');
?>
