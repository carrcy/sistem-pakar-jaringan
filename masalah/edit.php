<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$idmasalah = $_GET['idmasalah'];
$query = mysqli_query($connection, "SELECT * FROM masalah WHERE idmasalah='$idmasalah'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Masalah</h1>
    <a href="./index.php" class="btn btn-light">Kembali</a>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <!-- Form -->
          <form action="./update.php" method="post">
            <?php
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <input type="hidden" name="idmasalah" value="<?= $row['idmasalah'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID Masalah</td>
                  <td><input class="form-control" type="text" name="idmasalah" size="20" required value="<?= $row['idmasalah'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Masalah</td>
                  <td><input class="form-control" type="text" name="nmmasalah" size="30" required value="<?= $row['nmmasalah'] ?>"></td>
                </tr>
                <tr>
                  <td>Solusi</td>
                  <td><input class="form-control" type="text" name="solusi" size="50" required value="<?= $row['solusi'] ?>"></td>
                </tr>
                <tr>
                  <td>
                    <input class="btn btn-primary d-inline" type="submit" name="proses" value="Ubah">
                    <a href="./index.php" class="btn btn-danger ml-1">Batal</a>
                  <td>
                </tr>
              </table>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>
