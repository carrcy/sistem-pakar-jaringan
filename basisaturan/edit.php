<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
$idaturan = isset($_GET['idaturan']) ? $_GET['idaturan'] : exit('ID aturan tidak diberikan');
$query = mysqli_query($connection, "SELECT basis_aturan.idaturan, masalah.nmmasalah , detail_basis_aturan.idaturan, gejala.nmgejala 
                                    FROM basis_aturan 
                                    INNER JOIN detail_basis_aturan ON basis_aturan.idaturan=detail_basis_aturan.idaturan 
                                    INNER JOIN masalah ON basis_aturan.idmasalah=masalah.idmasalah 
                                    INNER JOIN gejala ON detail_basis_aturan.idgejala=gejala.idgejala WHERE detail_basis_aturan.idaturan='$idaturan'");
$data_masalah = mysqli_fetch_array($query);
$result2 = mysqli_query($connection, "SELECT * FROM gejala ORDER BY nmgejala ASC");

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
      <h1>Tambah Masalah</h1>
      <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- Form -->
          <div class="container mt-5">
              <h2>Pilih Masalah</h2>
              
              <!-- Form untuk submit data -->
              <form action="update.php" method="POST"> <!-- Ubah "proses.php" ke file PHP tujuan Anda -->
                <input type="hidden" name="idaturan" value="<?= $idaturan; ?>">
                  <!-- Dropdown yang akan menggunakan Chosen -->
                  <div class="card-body">
                    <div class="input-group">

                      <input class="form-control" type="text" name="nmgejala" size="80" value="<?= $data_masalah['nmmasalah']?>" disabled>

                    </div>
                  </div>
                  <label for="">pilih gejala gejala berikut:</label>
                  <!-- TAbel -->
                  <table class="table table-light table-striped w-100" id="table-1">
                    <thead>
                      <tr>
                        <th style="width: 100px"></th>
                        <th style="width: 80px">NO</th>
                        <th>Gejala</th>
                      </tr>
                    </thead>
                    <tbody>
                            <?php
                            $no = 1;
                            while ($data = mysqli_fetch_array($result2)) :
                                $idgejala = $data['idgejala'];
                                $result = mysqli_query($connection, "SELECT * FROM detail_basis_aturan WHERE idaturan='$idaturan' AND idgejala='$idgejala'");
                                
                                if (mysqli_num_rows($result) > 0) {
                                    // Jika data ada, tampilkan row dengan checkbox disabled
                              ?>
                                    <tr>
                                        <td><input type="checkbox" disabled> </td>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($data['nmgejala']); ?>
                                            <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="hapus.php?idgejala=<?= $data['idgejala']; ?>&idaturan=<?= $idaturan; ?>">
                                              <i class="fas fa-trash fa-fw"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                } else {
                                    // Jika data tidak ada, tampilkan checkbox yang aktif
                                    ?>
                                    <tr>
                                        <td><input type="checkbox" name="nmgejala[]" value="<?= htmlspecialchars($data['idgejala']); ?>"></td>
                                        <td><?= $no++; ?></td>
                                        <td><?= htmlspecialchars($data['nmgejala']); ?></td>
                                    </tr>
                                    <?php
                                }
                            endwhile;
                            ?>  
                    </tbody>
                  </table>
                  <!-- Tombol submit untuk mengirim data -->
                  <button type="submit" class="btn btn-primary mt-3">Submit</button>
                  <a href="./index.php" class="btn btn-danger mt-3">Batal</a>
              </form>
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