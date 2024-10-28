<?php
session_start(); // Tambahkan ini di awal untuk menggunakan $_SESSION
require_once '../helper/connection.php';


$iduser = $_SESSION['login']['iduser'];



$nmgejala = mysqli_query($connection, "SELECT COUNT(*) FROM gejala");
$nmmasalah = mysqli_query($connection, "SELECT COUNT(*) FROM masalah");
$idaturan = mysqli_query($connection, "SELECT COUNT(*) FROM basis_aturan");
$idkonsultasi = mysqli_query($connection, "SELECT COUNT(*) FROM kosultasi WHERE iduser='$iduser'");



$total_anggota = mysqli_fetch_array($nmgejala)[0];
$total_buku = mysqli_fetch_array($nmmasalah)[0];
$total_peminjam = mysqli_fetch_array($idaturan)[0];
$total_kembali = mysqli_fetch_array($idkonsultasi)[0];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NetSolver</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="shortcut icon" href="../../assets/img/logoNet.png" type="image/x-icon">

    <style>
        .satu {
            height: 100vh;
            /* border: 1px solid red; */
            /* background-color: #6A9C89; */
        }
        
        
        .dua {
                height: 100vh;
            } 

        .navbar{
            /* height: 15%; */

        }
        .nav-link:hover{
          border-bottom: 2px solid white;
          transition: border-bottom 0.3s ease-in-out;
        }

        .container-fluid{
          width: 90%;

        }
        /* Gaya untuk tombol logout */
        .dropdown-item {
            background-color: #green; /* Warna latar belakang saat normal */
            color: white; /* Warna teks saat normal */
            transition: background-color 0.3s, color 0.3s; /* Efek transisi */
        }

        /* Gaya saat hover */
        .dropdown-item:hover {
            background-color: white; /* Warna latar belakang saat hover */
            color: #dc3545; /* Warna teks saat hover */
        }



    </style>
  </head>
  <body>
    <!-- Header 1 -->
    <nav class="navbar navbar-expand-lg navbar-success bg-success shadow-lg fixed-top ">
      <div class="container-fluid ">
        <a class="navbar-brand text-white ms-5 h1 fw-bold" href="#">NETSOLVER</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-right" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 me-5 mb-lg-0 gap-4 ">
            <li class="nav-item">
              <a class="nav-link fw-bold text-white " aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fw-bold text-white " aria-current="page" href="../konsultasi/tanya.php">Tanya Pakar</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link fw-bold text-white " aria-current="page" href="../konsultasi/index.php">Riwayat</a>
              
            </li>
            <li class="nav-item dropdown ps-1 pt-1">
                <a class="nav-link dropdown-toggle fw-bold text-dark h3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>Hi <?= $_SESSION['login']['username'] ?></strong>
                </a>
                <ul class="dropdown-menu w-50 rounded-5 bg-danger p-1">
                    <li>
                        <a class="dropdown-item text-center rounded-5 m-0 p-1" href="../../logout.php" style="background-color: #dc3545; color: white;">
                            <strong>Logout</strong>
                        </a>
                    </li>
                </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- HEADER -->
    
    <!-- MAIN SECTION -->
      
    <div class="container mt-5">
      <div class="row d-flex align-items-center justify-content-center custom-layout">
        <!-- Kolom Teks -->
        <div class="col-lg-6 text-center text-lg-start order-2 order-lg-1 mb-4 mb-lg-0">
          <h2 class="ms-2">Selamat Datang <strong class="text-success display-6 fw-bold"><?= $_SESSION['login']['username'] ?></strong></h2>
          <h1 class="text-success display-1 fw-bold"><strong>Netsolver</strong></h1>
          <h2 class="fw-bold mb-3 text-dark">Solusi Jaringan yang Cerdas!</h2>
          <p class="lead mt-2 mb-4">
            Netsolver adalah sistem pakar cerdas yang dirancang untuk membantu Anda mengatasi berbagai permasalahan jaringan dengan mudah. Apakah Anda menghadapi masalah koneksi lambat, perangkat tidak terhubung, atau konfigurasi yang rumit?
          </p>
        </div>
        <!-- Kolom Gambar -->
        <div class="col-lg-6 text-center order-1 order-lg-2">
          <img src="../../assets/img/ro.png" class="rounded img-fluid d-block mx-auto" alt="Ilustrasi Netsolver" />
        </div>
      </div>
    </div>
    
    <!-- tentang netsolver -->
    <div class="p-5 mb-5 mt-5 min-vh-50  rounded-4 text-body-emphasis bg-body-secondary ">
      <div class="row align-items-center">
        <div class="col-lg-6 text-center text-lg-start order-2 order-lg-1 mb-4 mb-lg-0">
          <img src="../../assets/img/bg2.jpg" class="rounded-5 img-fluid shadow-lg" alt="Ilustrasi Netsolver" />
        </div>
        <div class="col-lg-6 order-1 order-lg-2 text-center text-lg-start">
          <h2 class="fw-bold display-6 ">Tentang Netsolver</h2>
          <h3 class="fw-bold text-success mb-3">Solusi Cerdas untuk Permasalahan Jaringan Anda</h3>
          <p class="lead">
            Netsolver adalah sistem pakar yang dirancang untuk membantu Anda dalam mengidentifikasi dan menyelesaikan berbagai permasalahan jaringan dengan cepat dan efisien. Mulai dari masalah koneksi internet yang lambat, perangkat yang tidak dapat terhubung, hingga konfigurasi yang kompleks—Netsolver hadir sebagai solusi cerdas yang mempermudah proses pemecahan masalah jaringan Anda.
          </p>
        </div>  
      </div>
    </div>    

    <!-- Bagian Bawah -->
    <div class="col text-center mt-5 h-auto pt-5 mb-5">
      <h1 class="fw-bold h3 text-success">PERMASALAHAN YANG SERING TERJADI</h1>
    </div>

    <!-- Daftar Permasalahan -->
    <div class="container w-100 w-md-75 w-lg-50">
      <!-- Item 1 -->
      <div class="bg-light shadow p-4 rounded-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <h5>1. Tidak Ada Koneksi Internet</h5>
          <i class="bi bi-arrow-down-circle" type="button" data-bs-toggle="collapse" data-bs-target="#contentSatu" aria-expanded="false" aria-controls="contentSatu">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
            </svg>
          </i>
        </div>
        <div class="collapse" id="contentSatu">
          <p class="mt-3 text-dark">
            "Koneksi internet terputus? Hal ini bisa terjadi karena beberapa alasan. Cek pengaturan jaringan atau coba restart modem Anda untuk melihat apakah masalah dapat teratasi. Jika masalah tetap berlanjut, mungkin perlu melakukan diagnosa lebih lanjut."
          </p>
        </div>
      </div>
      
      <!-- Item 2 -->
      <div class="bg-light shadow p-4 rounded-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <h5>2. Koneksi Internet Lambat</h5>
          <i class="bi bi-arrow-down-circle" type="button" data-bs-toggle="collapse" data-bs-target="#contentDua" aria-expanded="false" aria-controls="contentDua">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
            </svg>
          </i>
        </div>
        <div class="collapse" id="contentDua">
          <p class="mt-3 text-dark">
            "Kecepatan internet yang lambat dapat membuat aktivitas online menjadi terganggu. Coba periksa apakah ada perangkat lain yang menggunakan banyak bandwidth atau lakukan restart pada router. Mengetahui penyebabnya bisa membantu meningkatkan kecepatan internet."
          </p>
        </div>
      </div>

      <div class="bg-light shadow p-4 rounded-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <h5>3. IP Conflict Bermasalah</h5>
          <i class="bi bi-arrow-down-circle" type="button" data-bs-toggle="collapse" data-bs-target="#contentTiga" aria-expanded="false" aria-controls="contentTiga">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
            </svg>
          </i>
        </div>
        <div class="collapse" id="contentTiga">
          <p class="mt-3 text-dark">
            "Konflik IP terjadi ketika dua perangkat memiliki alamat IP yang sama. Hal ini bisa menyebabkan masalah pada koneksi jaringan. Atur ulang alamat IP perangkat atau gunakan DHCP untuk mencegah masalah ini."
          </p>
        </div>
      </div>
      <br>

      <div class="bg-light shadow p-4 rounded-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <h5>4. Tidak Bisa Melakukan Ping</h5>
          <i class="bi bi-arrow-down-circle" type="button" data-bs-toggle="collapse" data-bs-target="#contentEmpat" aria-expanded="false" aria-controls="contentEmpat">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
            </svg>
          </i>
        </div>
        <div class="collapse" id="contentEmpat">
          <p class="mt-3 text-dark">
            "Jika Anda tidak dapat melakukan ping, perangkat mungkin tidak terhubung dengan jaringan dengan benar. Coba cek kabel atau sinyal Wi-Fi, atau lakukan pengaturan ulang jaringan untuk mengatasi masalah ini."
          </p>
        </div>
      </div>
      <br>

      <div class="bg-light shadow p-4 rounded-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <h5>5. Terputusnya Koneksi Secara Acak</h5>
          <i class="bi bi-arrow-down-circle" type="button" data-bs-toggle="collapse" data-bs-target="#contentLima" aria-expanded="false" aria-controls="contentLima">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
            </svg>
          </i>
        </div>
        <div class="collapse" id="contentLima">
          <p class="mt-3 text-dark">
            "Jika koneksi sering terputus tanpa alasan yang jelas, coba periksa kekuatan sinyal Wi-Fi atau update firmware router. Koneksi yang stabil akan memastikan pengalaman online yang lancar."
          </p>
        </div>
      </div>
      <br>

      <div class="bg-light shadow p-4 rounded-3 mb-3">
        <div class="d-flex justify-content-between align-items-center">
          <h5>6. Tidak Dapat Mengakses Situs Web Tertentu</h5>
          <i class="bi bi-arrow-down-circle" type="button" data-bs-toggle="collapse" data-bs-target="#contentTujuh" aria-expanded="false" aria-controls="contentTujuh">
            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8m15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293z"/>
            </svg>
          </i>
        </div>
        <div class="collapse" id="contentTujuh">
          <p class="mt-3 text-dark">
            "Jika Anda tidak bisa membuka situs web tertentu, periksa apakah situs tersebut sedang mengalami downtime atau coba nonaktifkan VPN. Pengaturan DNS yang tepat bisa membantu akses ke semua situs web."
          </p>
        </div>
      </div>
    </div>

    <!-- footer -->
    <footer class="py-5 container bg-dark min-vw-100 text-white bottom p-0 mt-5">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3 text-white">
              <li class="nav-item "><a href="#" class="nav-link px-2 text-white">Home</a></li>
              <li class="nav-item "><a href="#" class="nav-link px-2 text-white">Features</a></li>
              <li class="nav-item "><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
              <li class="nav-item "><a href="#" class="nav-link px-2 text-white">FAQs</a></li>
              <li class="nav-item "><a href="#" class="nav-link px-2 text-white">About</a></li>
            </ul>
            <p class="text-center text-success fw-bold">© 2024 Netsolver, Inc</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
