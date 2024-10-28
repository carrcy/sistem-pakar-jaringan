<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
$idaturan = $_GET['idaturan'];
$query = mysqli_query($connection, "SELECT basis_aturan.idaturan, masalah.nmmasalah , detail_basis_aturan.idaturan, gejala.nmgejala 
                                    FROM basis_aturan 
                                    INNER JOIN detail_basis_aturan ON basis_aturan.idaturan=detail_basis_aturan.idaturan 
                                    INNER JOIN masalah ON basis_aturan.idmasalah=masalah.idmasalah 
                                    INNER JOIN gejala ON detail_basis_aturan.idgejala=gejala.idgejala WHERE detail_basis_aturan.idaturan='$idaturan'");
$data_masalah = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data</title>
  <!-- Chosen CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet">

  <!-- Bootstrap CSS (Optional, jika ingin menggunakan) -->

</head>
<body>
  
  <section class="section">
    <div class="section-header d-flex justify-content-between">
      <h1>DETAIL Masalah</h1>
      <a href="./index.php" class="btn btn-light">Kembali</a>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
              <div class="input-group">
             
                <input class="form-control" type="text" name="nmgejala" size="80" value="<?= $data_masalah['nmmasalah']?>" disabled>
        
              </div>
            </div>
            <!-- Form -->
            <div class="container mt-5">
            <table class="table table-light table-striped w-100" id="table-1">
                    <thead>
                      <tr>
                        <th style="width: 80px">NO</th>
                        <th>Gejala</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php

$query2 = mysqli_query($connection, "SELECT  detail_basis_aturan.idaturan, gejala.nmgejala 
FROM detail_basis_aturan
INNER JOIN gejala ON detail_basis_aturan.idgejala=gejala.idgejala WHERE detail_basis_aturan.idaturan='$idaturan'");


                    $no=1;
                    while ($data_masalah2 = mysqli_fetch_array($query2)) :
                    ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $data_masalah2['nmgejala'] ?></td>
                        </tr>

                      <?php
                      endwhile;
                      ?>  
                    </tbody>
                  </table>
            </div>
          </div>
      </div>
    </div>
  </section>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Chosen JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>

    <!-- Inisialisasi Chosen -->
    <script type="text/javascript">
        $(document).ready(function() {
            // Inisialisasi plugin Chosen
            $(".chosen-select").chosen({
                width: "100%", 
                no_results_text: "Data tidak ditemukan", 
                allow_single_deselect: true 
            });
        });
    </script>

<?php
require_once '../layout/_bottom.php';
?>

<?php
// Menutup koneksi ke database
$connection->close();
?>
</body>
</html>