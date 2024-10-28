<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$idgejala = $_GET['idgejala'];
$query = mysqli_query($connection, "SELECT * FROM gejala WHERE idgejala='$idgejala'");
?>

<section class="section">
  <div class="section-header d-flex justify-content-between">
    <h1>Ubah Data Gejala</h1>
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
              <input type="hidden" name="idgejala" value="<?= $row['idgejala'] ?>">
              <table cellpadding="8" class="w-100">
                <tr>
                  <td>ID Gejala</td>
                  <td><input class="form-control" type="text" name="idgejala" size="20" required value="<?= $row['idgejala'] ?>" disabled></td>
                </tr>
                <tr>
                  <td>Nama Gejala</td>
                  <td><input class="form-control" type="text" name="nmgejala" size="20" required value="<?= $row['nmgejala'] ?>"></td>
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
