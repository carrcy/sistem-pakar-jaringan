<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';
$idkonsultasi= $_GET['idkonsultasi'];


$result = mysqli_query($connection, "SELECT kosultasi.tanggal, detail_masalah.idmasalah, detail_masalah.persentase FROM detail_masalah
                                      INNER JOIN kosultasi on detail_masalah.idkonsultasi= kosultasi.idkonsultasi WHERE kosultasi.idkonsultasi='$idkonsultasi' ");
?>


<section class="section">
    <div class="section-header d-flex justify-content-between">
      <h1>Hasil Konsultasi</h1>
      <a href="./index.php" class="btn btn-light">Kembali</a>
    </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="table-1">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Masalah</th>
                  <th>Persentase</th>
                  <th>solusi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($result)) :
                  $idmasalah=$data['idmasalah'];
                  $result2 = mysqli_query($connection, "SELECT * FROM masalah
                  WHERE idmasalah='$idmasalah' ");
                  $data2 = mysqli_fetch_array($result2)

                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data2['nmmasalah'] ?></td>
                    <td><?= $data['persentase'] ?>%</td>
                    <td><?= $data2['solusi'] ?></td>

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
