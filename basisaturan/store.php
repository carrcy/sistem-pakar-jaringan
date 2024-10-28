<?php
session_start();
require_once '../helper/connection.php'; // Menghubungkan ke database

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $idmasalah = mysqli_real_escape_string($connection, $_POST['nmmasalah']); // Sanitasi input
    $gejala_terpilih = isset($_POST['nmgejala']) ? $_POST['nmgejala'] : [];

    if (empty($idmasalah)) {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => 'Masalah harus dipilih!'
        ];
        header('Location: ./index.php');
        exit;
    }

    // Menyimpan basis aturan
    $query = "INSERT INTO basis_aturan (idaturan, idmasalah) VALUES (NULL, '$idmasalah')";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => 'Gagal menambahkan data ke basis aturan: ' . mysqli_error($connection)
        ];
        header('Location: ./index.php');
        exit;
    }

    if (empty($gejala_terpilih)) {
        $_SESSION['info'] = [
            'status' => 'failed',
            'message' => 'Setidaknya satu gejala harus dipilih!'
        ];
        header('Location: ./index.php');
        exit;
    }

    // Mengambil id aturan terakhir
    $result2 = mysqli_query($connection, "SELECT * FROM basis_aturan ORDER BY idaturan DESC LIMIT 1");
    $data = mysqli_fetch_array($result2);
    $idaturan = $data['idaturan'];

    foreach ($gejala_terpilih as $idgejala) {
        $idgejala = mysqli_real_escape_string($connection, $idgejala); // Sanitasi input
        $query2 = "INSERT INTO detail_basis_aturan (idaturan, idgejala) VALUES ('$idaturan', '$idgejala')";
        $result3 = mysqli_query($connection, $query2);

        if (!$result3) {
            $_SESSION['info'] = [
                'status' => 'failed',
                'message' => 'Gagal menambahkan data: ' . mysqli_error($connection)
            ];
            header('Location: ./index.php');
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
 