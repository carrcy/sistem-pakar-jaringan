<?php
// Mulai sesi hanya jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Fungsi isLogin untuk mengecek login dan level akses pengguna
function isLogin($requiredRole = null) {
    // Cek apakah pengguna sudah login
    if (!isset($_SESSION['login'])) {
        header('Location: ../../login.php');
        exit;
    }

    // Jika role diperlukan, lakukan pengecekan level akses
    if ($requiredRole !== null && $_SESSION['login']['level'] !== $requiredRole) {
      header('Location: ../../unauthorized.php'); // Arahkan ke halaman lain jika akses ditolak 
      exit;
    }
  
}
