<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM masalah");
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
              <form action="store.php" method="POST"> <!-- Ubah "proses.php" ke file PHP tujuan Anda -->
                  <!-- Dropdown yang akan menggunakan Chosen -->
                  <select class="form-control chosen-select" data-placeholder="Masukkan Masalah" name="nmmasalah">
                      <option value="">Pilih Masalah</option>
                      <?php
                      // Looping hasil query untuk menampilkan data dalam dropdown
                      while ($row = $result->fetch_assoc()) {
                          echo '<option value="'.$row['idmasalah'].'">'.$row['nmmasalah'].'</option>';
                      }
                      ?>
                  </select>
                  <label for="">pilih gejala gejala berikut:</label>
                  <!-- TAbel -->
                  <table class="table table-light table-striped w-100" id="table-1">
                    <thead>
                      <tr>
                        <th style="width: 80px"></th>
                        <th style="width: 80px">NO</th>
                        <th>Gejala</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no=1;
                    while ($data = mysqli_fetch_array($result2)) :
                    ?>
                      <tr>
                      <td><input type="checkbox" name="nmgejala[]" value="<?= $data['idgejala'] ?>"></td>
                        <td><?= $no++ ?></td>
                        <td><?= $data['nmgejala'] ?></td>
                        </tr>

                      <?php
                      endwhile;
                      ?>  
                    </tbody>
                  </table>
                  <!-- Tombol submit untuk mengirim data -->
                  <button type="submit" class="btn btn-primary mt-3">Submit</button>
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