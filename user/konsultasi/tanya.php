<?php
session_start(); // Tambahkan ini di awal untuk menggunakan $_SESSION
require_once '../helper/connection.php';

if (!isset($_SESSION['login'])) {
    // Redirect atau penanganan jika pengguna tidak login
    header("Location: login.php");
    exit();
}

$iduser = $_SESSION['login']['iduser'];

// Query ke database
$result = mysqli_query($connection, "SELECT * FROM user WHERE iduser='$iduser'");
$result2 = mysqli_query($connection, "SELECT * FROM gejala ORDER BY nmgejala ASC");
$data_masalah = mysqli_fetch_array($result);
?>

<!doctype html>
<html lang="en">
    <head>
        <title>NetSolver</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <link rel="shortcut icon" href="../../assets/img/logoNet.png" type="image/x-icon">

        <style>
            .nav-link:hover, .dropdown-item:hover {
            border-bottom: 2px solid white;
            transition: border-bottom 0.3s ease-in-out;
        }
        </style>
    </head>

    <body>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-success bg-success shadow-lg fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand text-white ms-5 h1" href="#">NETSOLVER</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 me-5 mb-lg-0 gap-3 ">
                        <li class="nav-item">
                            <a class="nav-link active fw-bold text-white" aria-current="page" href="../dashboard2/index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active fw-bold text-white" href="#">Tanya Pakar</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link active fw-bold text-white" href="index.php">Riwayat</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Section Title -->
        <div class="con mt-5 h-25 bg-success text-center pb-4 pt-5">
            <h1 class="text-white fw-bold display-5"><strong>Konsultasi Keluhan</strong></h1>
        </div>

<!-- Form -->
        <form action="store.php" method="POST" class="m-3 p-4 bg-light shadow rounded">
            <input type="hidden" name="iduser" value="<?= $iduser; ?>">
            
            <div class="mb-3">
                <label for="nama" class="form-label h5 text-success"><strong>Nama:</strong></label>
                <input class="form-control" id="nama" type="text" name="nama" value="<?= $data_masalah['nama'] ?>" disabled>
                <input type="hidden" name="nama" value="<?= $data_masalah['nama'] ?>"> <!-- Menyimpan nilai yang sama pada input hidden -->
            </div>

            <label for="" class="h4 text-success text-center mb-3 fw-bold">Pilih gejala-gejala berikut:</label>

            <!-- Table -->
            <table class="table table-striped table-hover border">
                <thead class="table-success">
                    <tr>
                        <th style="width: 50px"></th>
                        <th style="width: 50px">NO</th>
                        <th>Gejala</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($data = mysqli_fetch_array($result2)) :
                    ?>
                    <tr>
                        <td><input type="checkbox" name="nmgejala[]" value="<?= $data['idgejala'] ?>"></td>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nmgejala'] ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>

            <!-- Submit Button -->
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-success rounded-5 btn-lg">Ajukan Pertanyaan</button>
            </div>
        </form>


        <!-- Footer -->
        <footer class="py-5 container bg-dark min-vw-100 text-white bottom p-0 mt-5">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3 text-white">
                <li class="nav-item "><a href="#" class="nav-link px-2 text-white">Home</a></li>
                <li class="nav-item "><a href="#" class="nav-link px-2 text-white">Features</a></li>
                <li class="nav-item "><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                <li class="nav-item "><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
                <li class="nav-item "><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>
            <p class="text-center text-success fw-bold">© 2024 Netsolver, Inc</p>
        </footer>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </body>
</html>
