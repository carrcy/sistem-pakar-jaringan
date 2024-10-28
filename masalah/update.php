<?php
session_start();
require_once '../helper/connection.php';

$idmasalah = isset($_POST['idmasalah']) ? htmlspecialchars($_POST['idmasalah']) : '';
$nmmasalah = isset($_POST['nmmasalah']) ? htmlspecialchars($_POST['nmmasalah']) : '';
$solusi = isset($_POST['solusi']) ? htmlspecialchars($_POST['solusi']) : '';


$query = mysqli_query($connection, "UPDATE masalah SET nmmasalah='$nmmasalah', solusi='$solusi' WHERE idmasalah='$idmasalah'");
if ($query) {
  $_SESSION['info'] = [
    'status' => 'success',
    'message' => 'Berhasil mengedit data'
  ];
  header('Location: ./index.php');
                                            } else {
                                              $_SESSION['info'] = [
                                                'status' => 'failed',
                                                'message' => mysqli_error($connection)
                                              ];
                                              header('Location: ./index.php');
                                            }
