<?php
//require_once '../layout/_top.php';
// session_start();
require_once '../helper/auth.php';

// isLogin();
require_once '../helper/connection.php';
$iduser= $_SESSION['login']['iduser'] ;

$result = mysqli_query($connection, "SELECT * FROM kosultasi WHERE iduser='$iduser' ");
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
      
      body{
        margin: 0;
        padding: 0;
        height: 100%;
      }
      
      html{
        margin: 0;
        padding: 0;


      }
      .nav-link:hover, .dropdown-item:hover {
          border-bottom: 2px solid green;
          transition: border-bottom 0.3s ease-in-out;
        }
    </style>
  </head>

  <body class="bg-success">
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow fixed-top">
      <div class="container-fluid">
          <a class="navbar-brand text-success ms-5 h1 fw-bold" href="#">Riwayat Konsultasi</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 me-5 mb-lg-0 gap-4">
                  <li class="nav-item">
                      <a href="../../user/dashboard2/index.php" class="nav-link text-success fw-bold">Home</a>
                  </li>
                  <li class="nav-item">
                      <a href="tanya.php" class="nav-link text-success fw-bold">Tanya Pakar</a>
                  </li>
                  <li class="nav-item">
                      <a href="../../user/dashboard2/index.php" class="nav-link text-success fw-bold">Kembali</a>
                  </li>
              </ul>
          </div>
      </div>
    </nav>

    <br>
    <div class="row m-auto mt-5 min-vh-100 mb-5 p-2" > <!-- Menambahkan padding untuk menjaga jarak dengan navbar -->
        <div class="col-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h4 class="card-title text-success text-center mb-4 fw-bold"><strong>Riwayat Konsultasi</strong></h4>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped text-center">
                            <thead class="table-success">
                                <tr>
                                    <th><strong>No</strong></th>
                                    <th><strong>Tanggal</strong></th>
                                    <th><strong>Cek Detail</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($result)) :
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= date('d-m-Y', strtotime($data['tanggal'])) ?></td> <!-- Format tanggal -->
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="detail.php?idkonsultasi=<?= $data['idkonsultasi'] ?>" style="transition: background-color 0.3s ease; border-radius: 5px;">
                                            <strong>Detail</strong> <!-- Menggunakan <strong> untuk menebalkan teks -->
                                        </a>
                                    </td>

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
          <footer class="py-5 container bg-dark min-vw-100 text-white bottom p-0">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3 text-white">
              <li class="nav-item "><a href="#" class="nav-link px-2 text-white">Home</a></li>
              <li class="nav-item "><a href="#" class="nav-link px-2 text-white">Features</a></li>
              <li class="nav-item "><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
              <li class="nav-item "><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
              <li class="nav-item "><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>
            <p class="text-center text-success fw-bold">© 2024 Netsolver, Inc</p>
          </footer>
      
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






<!--  -->
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

