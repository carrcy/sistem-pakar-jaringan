<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT basis_aturan.idaturan,basis_aturan.idmasalah,
                                            masalah.nmmasalah FROM basis_aturan INNER JOIN masalah
                                            ON basis_aturan.idmasalah=masalah.idmasalah ORDER BY nmmasalah");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Data Basis Aturan</h1>
    <a href="./create.php" class="btn btn-primary">Tambah Data</a>
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
                  <th>Nama masalah</th>
                  <th style="width: 150px">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($result)) :
                ?>

                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nmmasalah'] ?></td>
                    <td>
                      <a class="btn btn-sm btn-primary" href="detail.php?idaturan=<?= $data['idaturan'] ?>">
                        <i class="fas fa-file"></i>
                      </a>
                      <a class="btn btn-sm btn-info" href="edit.php?idaturan=<?= $data['idaturan'] ?>">
                        <i class="fas fa-edit fa-fw"></i>
                      </a>
                      <a class="btn btn-sm btn-danger mb-md-0 mb-1" href="delete.php?idaturan=<?= $data['idaturan'] ?>">
                        <i class="fas fa-trash fa-fw"></i>
                      </a>
                    </td>
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

<?php
require_once '../layout/_bottom.php';
?>
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
