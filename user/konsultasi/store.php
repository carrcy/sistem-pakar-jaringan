<?php
session_start();
require_once '../helper/connection.php'; // Menghubungkan ke database
date_default_timezone_set("Asia/Jakarta");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $iduser = $_POST['iduser']; // Sanitasi input
    $gejala_terpilih = isset($_POST['nmgejala']) ? $_POST['nmgejala'] : [];
    $tgl = date("Y/m/d");

    // Menyimpan konsultasi
    $query = "INSERT INTO kosultasi (idkonsultasi, tanggal, iduser) VALUES (NULL, '$tgl', '$iduser')";
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

    // Mengambil id konsultasi terakhir
    $result2 = mysqli_query($connection, "SELECT * FROM kosultasi ORDER BY idkonsultasi DESC LIMIT 1");
    $data = mysqli_fetch_array($result2);
    $idkonsultasi = $data['idkonsultasi'];

    // Menyimpan gejala yang dipilih ke detail_konsultasi
    foreach ($gejala_terpilih as $idgejala) {
        $idgejala = mysqli_real_escape_string($connection, $idgejala); // Sanitasi input
        $query2 = "INSERT INTO detail_konsultasi (idkonsultasi, idgejala) VALUES ('$idkonsultasi', '$idgejala')";
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

    // Mengambil data masalah
    $result8 = mysqli_query($connection, "SELECT * FROM masalah"); 
    
    while ($data3 = mysqli_fetch_array($result8)) {
        $jyes = 0;
        $idmasalah = $data3['idmasalah'];

        // Menghitung jumlah gejala yang terkait dengan masalah ini
        $result4 = mysqli_query($connection, "SELECT COUNT(idgejala) AS jml_gejala FROM detail_basis_aturan INNER JOIN basis_aturan ON basis_aturan.idaturan = detail_basis_aturan.idaturan WHERE basis_aturan.idmasalah = '$idmasalah'");
        $data4 = mysqli_fetch_array($result4);
        $jml_gejala = $data4['jml_gejala'];

        // Mengambil gejala dari basis aturan untuk masalah tertentu
        $result5 = mysqli_query($connection, "SELECT idgejala FROM detail_basis_aturan INNER JOIN basis_aturan ON basis_aturan.idaturan = detail_basis_aturan.idaturan WHERE basis_aturan.idmasalah = '$idmasalah'");
        $basis_gejala = [];
        while ($data5 = mysqli_fetch_array($result5)) {
            $basis_gejala[] = $data5['idgejala'];
        }

        // Mengambil gejala yang dipilih user untuk konsultasi tertentu
        $result6 = mysqli_query($connection, "SELECT idgejala FROM detail_konsultasi WHERE idkonsultasi = '$idkonsultasi'");
        $user_gejala = [];
        while ($data6 = mysqli_fetch_array($result6)) {
            $user_gejala[] = $data6['idgejala'];
        }

        // Bandingkan gejala dari basis aturan dengan gejala yang dipilih user
        foreach ($basis_gejala as $idgejalane) {
            if (in_array($idgejalane, $user_gejala)) {
                $jyes += 1; // Jika cocok, tambahkan $jyes
            }
        }

        // Menghitung persentase kecocokan gejala
        if ($jml_gejala > 0) {
            $peluang = round(($jyes / $jml_gejala) * 100, 2);
        } else {
            $peluang = 0;
        }

        // Menyimpan hasil kecocokan masalah
        if($peluang>0){
            $query9 = "INSERT INTO detail_masalah (idkonsultasi, idmasalah, persentase) VALUES ('$idkonsultasi', '$idmasalah', '$peluang')";
            $result9 = mysqli_query($connection, $query9);
        if (!$result9) {
            echo "Error: " . mysqli_error($connection);
        }
        }
    }

    $_SESSION['info'] = [
        'status' => 'success',
        'message' => 'Data berhasil ditambahkan!'
    ];
    header('Location: index.php');
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
