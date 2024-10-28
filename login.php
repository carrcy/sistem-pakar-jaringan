<?php
session_start();
require_once 'helper/connection.php';

if (isset($_POST['submit'])) {
  // Escape input untuk mencegah SQL injection
  $username = mysqli_real_escape_string($connection, $_POST['username']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);
  $level = mysqli_real_escape_string($connection, $_POST['level']);

  // Query untuk memeriksa apakah pengguna ada di database
  $sql = "SELECT * FROM user WHERE username=? AND password=? AND level=?";
  $stmt = $connection->prepare($sql);
  $stmt->bind_param("sss", $username, $password, $level);
  $stmt->execute();
  $result = $stmt->get_result();
  $row = $result->fetch_assoc();

  // Jika login berhasil (baris data ditemukan)
  if ($result->num_rows === 1)  {
    // Simpan data pengguna ke dalam session, termasuk iduser
    $_SESSION['login'] = [
        'iduser' => $row['iduser'],      // Menyimpan iduser ke session
        'nama' => $row['nama'],          // Menyimpan nama ke session (opsional)
        'username' => $row['username'],  // Menyimpan username ke session (opsional)
        'level' => $row['level']         // Menyimpan level ke session
    ];

    // Cek level pengguna untuk menentukan halaman tujuan
    if ($row['level'] == 'user') {
        header('Location: user/dashboard2/index.php'); // Pengguna biasa
    } elseif ($row['level'] == 'admin') {
        header('Location: dashboard/index.php');       // Admin
    }
    exit();
  } else {
    // Jika login gagal, tampilkan pesan kesalahan
    $error = true;
  }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>NetSolver</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <link rel="shortcut icon" href="assets/img/logoNet.png" type="image/x-icon">

  <style>
    body {
      background-color: #72BF78;
      background-size: cover;
      background-repeat: no-repeat;
      width: 100%;
      height: 100%;
      margin: 0;
    }
  </style>
</head>

<body >
      <div class="container d-flex vh-100 m-auto p-5 align-items-center justify-contens-center">
        <!-- <div class="row border"> -->
          <!-- <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 border"> -->
            <!-- <div class="login-brand">
              <img src="assets/img/fst2.png" alt="logo" width="200">
            </div> -->

            <div class="card col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 shadow ">
              <div class="text-center mt-4 text-success">
                <h4><strong>Login</strong></h4>
              </div>

              <div class="card-body">
                <form method="POST" action="" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Mohon isi username
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Mohon isi kata sandi
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="level">Sebagai</label>
                    <select id="level" class="form-control" name="level" tabindex="3" required>
                      <option value="user">User</option>
                      <option value="admin">Admin</option>
                    </select>
                    <div class="invalid-feedback">
                      Mohon pilih level
                    </div>
                  </div>

                    <!-- <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                        <label class="custom-control-label" for="remember-me">Ingat Saya</label>
                      </div>
                    </div> -->

                  <div class="form-group">
                    <button name="submit" type="submit" class="btn btn-success btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                <!-- <div class="form-group">
                    <a href="./regitrasi/create.php" class="btn btn-primary btn-lg btn-block" tabindex="4">Daftar</a>
                </div> -->
                <?php
                  // var_dump($error);
                    if(isset($error)) {
                        echo "<p class='alert alert-danger mt-4'> password/user salah </p>";
                    }
                ?>                
              </div>
            </div>
            <!-- <div class="simple-footer">
              UIN WS
            </div> -->
          </div>
        </div>
      </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <script src="assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
