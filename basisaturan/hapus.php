<?php
session_start();
require_once '../helper/connection.php';

$idgejala = $_GET['idgejala'];
$idaturan=$_GET['idaturan'];

$result = mysqli_query($connection, "DELETE FROM detail_basis_aturan WHERE idaturan='$idaturan' AND idgejala='$idgejala'");

if (mysqli_affected_rows($connection) > 0) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menghapus data'
  ];
  header('Location: ./index.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ./edit.php');
}