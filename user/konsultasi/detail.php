<?php
//require_once '../layout/_top.php';
require_once '../helper/connection.php';
$idkonsultasi= $_GET['idkonsultasi'];


$result = mysqli_query($connection, "SELECT kosultasi.tanggal, detail_masalah.idmasalah, detail_masalah.persentase FROM detail_masalah INNER JOIN kosultasi on detail_masalah.idkonsultasi= kosultasi.idkonsultasi WHERE kosultasi.idkonsultasi='$idkonsultasi' ");
?>

<!doctype html>
<html lang="en">
  <head>
    <title>NetSolver</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" href="../../assets/img/logoNet.png" type="image/x-icon">

    <style>
      .nav-link:hover, .dropdown-item:hover {
          border-bottom: 2px solid white;
          transition: border-bottom 0.3s ease-in-out;
        }
    </style>
  </head>

  <body>
      <section class="section">
        <nav class="navbar navbar-expand-lg navbar-white bg-success shadow fixed-top ">
          <div class="container-fluid">
            <a class="navbar-brand text-white ms-5 h1 fw-bold" href="#">Detail Hasil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 me-5 mb-lg-0 gap-4 ">
                  <li class="nav-item "><a href="../../user/dashboard2/index.php" class="nav-link text-white fw-bold">Home</a></li>
                  <li class="nav-item "><a href="tanya.php" class="nav-link text-white fw-bold">Konsultasi</a></li>
                  <li class="nav-item "><a href="index.php" class="nav-link text-white fw-bold">Kembali</a></li>
                </ul>
            </div>
          </div>
        </nav>
        <br>
        <br>
        <div class="row rounded-2 ms-5 me-5 pt-2 vh-100">
          <div class="card mt-5 border shadow rounded-4 p-5">
              <div class="card-body">
                  <h2 class="text-center text-success fw-bold mb-4">Daftar Masalah dan Solusi</h2> <!-- Judul Card -->
                  <div class="table-responsive">
                      <table class="table table-hover table-striped w-100">
                          <thead class="table-success"> <!-- Header dengan latar belakang hijau -->
                              <tr>
                                  <th><strong>No</strong></th>
                                  <th><strong>Masalah</strong></th>
                                  <th><strong>Persentase</strong></th>
                                  <th><strong>Solusi</strong></th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                              $no = 1;
                              while ($data = mysqli_fetch_array($result)) :
                                  $idmasalah = $data['idmasalah'];
                                  $result2 = mysqli_query($connection, "SELECT * FROM masalah WHERE idmasalah='$idmasalah'");
                                  $data2 = mysqli_fetch_array($result2);
                              ?>
                                  <tr>
                                      <td><?= $no++ ?></td>
                                      <td><?= $data2['nmmasalah'] ?></td>
                                      <td><?= $data['persentase'] ?>%</td>
                                      <td><?= $data2['solusi'] ?></td>
                                  </tr>
                              <?php endwhile; ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
        </div>

        </div>

        <!-- footer -->
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
      </section>

    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>





<!-- Page Specific JS File -->
<?php
if (isset($_SESSION['info'])) :
  if ($_SESSION['info']['status'] == 'success') {
?>
    <script>
      iziToast.success({
        title: 'Sukses',
        message: `<?= $_SESSION['info']['message'] ?>`,
        position: 'topCenter',
        timeout: 5000
      });
    </script>
  <?php
  } else {
  ?>
    <script>
      iziToast.error({
        title: 'Gagal',
        message: `<?= $_SESSION['info']['message'] ?>`,
        timeout: 5000,
        position: 'topCenter'
      });
    </script>
<?php
  }

  unset($_SESSION['info']);
  $_SESSION['info'] = null;
endif;
?>
<script src="../assets/js/page/modules-datatables.js"></script>
