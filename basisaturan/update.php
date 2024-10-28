<?php
session_start();
require_once '../helper/connection.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $idaturan = $_POST['idaturan'];
    $gejala_terpilih = isset($_POST['nmgejala']) ? $_POST['nmgejala'] : [];


    foreach ($gejala_terpilih as $idgejala) {
        $idgejala = mysqli_real_escape_string($connection, $idgejala); // Sanitasi input
        $query2 = "INSERT INTO detail_basis_aturan (idaturan, idgejala) VALUES ('$idaturan', '$idgejala')";
        $result3 = mysqli_query($connection, $query2);

        if (!$result3) {
            $_SESSION['info'] = [
                'status' => 'failed',
                'message' => 'Gagal menambahkan data: ' . mysqli_error($connection)
            ];
            header('Location: ./edit.php');
            exit;
        }
    }

    $_SESSION['info'] = [
        'status' => 'success',
        'message' => 'Data berhasil ditambahkan!'
    ];
    header('Location: ./index.php');
    exit;

} else {
    $_SESSION['info'] = [
        'status' => 'failed',
        'message' => 'Metode request tidak valid!'
    ];
    header('Location: ./index.php');
    exit;
}

mysqli_close($connection);
?>
 