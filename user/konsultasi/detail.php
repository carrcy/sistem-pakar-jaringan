<?php
require_once '../helper/auth.php';
isLogin('user');

require_once '../helper/connection.php';

// Pastikan idkonsultasi ada di URL
if (!isset($_GET['idkonsultasi']) || empty($_GET['idkonsultasi'])) {
    die('ID Konsultasi tidak ditemukan.');
}
$idkonsultasi = $_GET['idkonsultasi'];

// Query untuk mengambil data konsultasi termasuk nama user dan tanggal
$result = mysqli_query($connection, "
    SELECT 
        kosultasi.tanggal, 
        detail_masalah.idmasalah, 
        detail_masalah.persentase, 
        user.nama AS nama_user 
    FROM detail_masalah 
    INNER JOIN kosultasi ON detail_masalah.idkonsultasi = kosultasi.idkonsultasi 
    INNER JOIN user ON kosultasi.iduser = user.iduser
    WHERE kosultasi.idkonsultasi = '$idkonsultasi'
");

// Cek apakah query berhasil
if (!$result) {
    die('Query failed: ' . mysqli_error($connection));
}

$data = mysqli_fetch_array($result); 
?>

<!doctype html>
<html lang="en">
<head>
  <title>NetSolver</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="shortcut icon" href="../../assets/img/logoNet.png" type="image/x-icon">
  <style>
    .nav-link{
          color: white;
        }
        
        .nav-link:hover{
          color: #E7D37F;
        }
    .footer {
      position: fixed;
      bottom: 0;
      width: 100%;
    }
    .vh-custom {
      min-height: 80vh;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-white bg-success shadow fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand text-white ms-5 h1 fw-bold" href="#">Detail Hasil</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 me-5 mb-lg-0 gap-4">
          <li class="nav-item"><a href="../../user/dashboard2/index.php" class="nav-link fw-bold">Home</a></li>
          <li class="nav-item"><a href="tanya.php" class="nav-link fw-bold">Tanya Pakar</a></li>
          <li class="nav-item"><a href="index.php" class="nav-link fw-bold">Kembali</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="section vh-custom d-flex align-items-center mt-5 mb-5">
    <div class="container mt-5">
      
        <div class="card-body">
          <h2 class="text-center text-success fw-bold mb-4">Daftar Masalah dan Solusi</h2>
          
          <div class="mb-4">
            <h5 class="fw-bold">Nama Pengguna: <?= $data['nama_user'] ?></h5>
            <p class="text-muted">Tanggal Konsultasi: <?= date("d F Y", strtotime($data['tanggal'])) ?></p>
          </div>

          <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered w-100">
              <thead class="table-success">
                <tr>
                  <th>No</th>
                  <th>Masalah</th>
                  <th>Persentase</th>
                  <th>Solusi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                do {
                  // Ambil data masalah terkait
                  $idmasalah = $data['idmasalah'];
                  $result2 = mysqli_query($connection, "SELECT * FROM masalah WHERE idmasalah='$idmasalah'");
                  if (!$result2) {
                      die('Query failed: ' . mysqli_error($connection));
                  }
                  $data2 = mysqli_fetch_array($result2);
                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data2['nmmasalah'] ?></td>
                    <td><?= $data['persentase'] ?>%</td>
                    <td><?= $data2['solusi'] ?></td>
                  </tr>
                <?php } while ($data = mysqli_fetch_array($result)); ?>
              </tbody>
            </table>
            <a href="cetak.php?idkonsultasi=<?= $idkonsultasi?>" target="_blank" class="btn btn-primary">Cetak PDF</a>
          </div>
        </div>
    </div>
  </section>

  <footer class=" py-3 bg-dark text-white text-center">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3 text-white">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Home</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Features</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-white">About</a></li>
    </ul>
    <p class="text-center text-success fw-bold">© 2024 Netsolver, Inc</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
