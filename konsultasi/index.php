<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$result = mysqli_query($connection, "SELECT * FROM kosultasi ");
?>


<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Riwayat Konsultasi</h1>
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
                  <th>Tanggal</th>
                  <th>Nama</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                while ($data = mysqli_fetch_array($result)) :
                  $iduser=$data['iduser'];
                  $result2 = mysqli_query($connection, "SELECT * FROM user
                  WHERE iduser='$iduser' ");
                  $data2 = mysqli_fetch_array($result2)

                ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data['tanggal'] ?></td>               
                    <td><?= $data2['nama'] ?></td>               
                    <td>
                      <a class="btn btn-sm btn-primary" href="detail.php?idkonsultasi=<?= $data['idkonsultasi'] ?>">
                        <i class="fas fa-file"></i>
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
