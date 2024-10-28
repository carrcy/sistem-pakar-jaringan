<?php
session_start();
require_once '../helper/connection.php';

$nama =isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : '';
$username =isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '';
$password =isset($_POST['password']) ? htmlspecialchars($_POST['password']) : '';
$level= "user";

$query = "INSERT INTO user (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')";

if (mysqli_query($connection, $query)) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data pengembalian'
  ];
  header('Location: ../utama.php');
} else {
  $_SESSION['info'] = [
    'status' => 'failed',
    'message' => mysqli_error($connection)
  ];
  header('Location: ../utama.php');
}
?>