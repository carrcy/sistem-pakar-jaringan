<?php
session_start();
require_once '../helper/connection.php';

$nmmasalah = isset($_POST['nmmasalah']) ? htmlspecialchars($_POST['nmmasalah']) : '';
$solusi = isset($_POST['solusi']) ? htmlspecialchars($_POST['solusi']) : '';

$query = "INSERT INTO gejala (nmgejala) VALUES ('$nmgejala')";
if (mysqli_query($connection, $query)) {
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