<?php
require_once '../layout/_top.php';
require_once '../helper/connection.php';

$nama = mysqli_query($connection, "SELECT COUNT(*) FROM user WHERE level = 'user'");
$nmgejala = mysqli_query($connection, "SELECT COUNT(*) FROM gejala");
$nmmasalah = mysqli_query($connection, "SELECT COUNT(*) FROM masalah");
$idaturan = mysqli_query($connection, "SELECT COUNT(*) FROM basis_aturan");
$idkonsultasi = mysqli_query($connection, "SELECT COUNT(*) FROM kosultasi");



$total_user = mysqli_fetch_array($nama)[0];
$total_anggota = mysqli_fetch_array($nmgejala)[0];
$total_buku = mysqli_fetch_array($nmmasalah)[0];
$total_peminjam = mysqli_fetch_array($idaturan)[0];
$total_kembali = mysqli_fetch_array($idkonsultasi)[0];
?>

<section class="section">
  <div class="section-header ">
    <h1 class="fw-bold text-success text-center m-auto">Dashboard</h1>
  </div>
  <div class="column">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total User</h4>
            </div>
            <div class="card-body">
              <?= $total_user ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Gejala</h4>
            </div>
            <div class="card-body">
              <?= $total_anggota ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total masalah</h4>
            </div>
            <div class="card-body">
              <?= $total_buku ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Basis aturan</h4>
            </div>
            <div class="card-body">
              <?= $total_peminjam?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>total konsultasi</h4>
            </div>
            <div class="card-body">
              <?= $total_kembali?>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>
</section>

<?php
require_once '../layout/_bottom.php';
?>