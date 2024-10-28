<?php
session_start();
require_once '../helper/connection.php';

$nmgejala =isset($_POST['nmgejala']) ? htmlspecialchars($_POST['nmgejala']) : '';

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