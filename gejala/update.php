<?php
session_start();
require_once '../helper/connection.php';

$idgejala = isset($_POST['idgejala']) ? htmlspecialchars($_POST['idgejala']) : '';
$nmgejala =isset($_POST['nmgejala']) ? htmlspecialchars($_POST['nmgejala']) : '';

$query = mysqli_query($connection, "UPDATE gejala SET nmgejala='$nmgejala' WHERE idgejala='$idgejala'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil menambah data'
  ];
  header('Location: ./index.php');
                                            } else {
                                              $_SESSION['info'] = [
                                                'status' => 'failed',
                                                'message' => mysqli_error($connection)
                                              ];
                                              header('Location: ./index.php');
                                            }
