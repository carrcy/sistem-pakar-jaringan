<?php
session_start();
require_once '../helper/connection.php';

$id_peminjaman = $_POST['id_peminjaman'];
$tanggal_pengembalian = $_POST['tanggal_pengembalian'];
$denda = $_POST['denda'];

// Function to update the status of peminjaman
function updateStatusPeminjaman($connection, $idPeminjaman) {
  $update = "UPDATE tbl_peminjaman SET status='Dikembalikan' WHERE id_peminjaman='$idPeminjaman'";
  mysqli_query($connection, $update);
}

$query = "INSERT INTO tbl_pengembalian (id_peminjaman, tanggal_pengembalian, denda) VALUES ('$id_peminjaman', '$tanggal_pengembalian', '$denda')";
if (mysqli_query($connection, $query)) {
  updateStatusPeminjaman($connection, $id_peminjaman); // Update status peminjaman
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data pengembalian'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./index.php');
}
?>
