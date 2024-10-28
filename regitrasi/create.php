
<!doctype html>
<html lang="en">
  <head>
    <title>Rgistrasi NetSolver</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link rel="shortcut icon" href="../assets/img/logoNet.png" type="image/x-icon">
  </head>

  <body>
      <main class="m-auto bg-success">
        <div class="con">
            <div class="row d-flex align-items-center justify-content-center custom-layout">
                
                <!-- Kolom Gambar -->
                <div class="col-lg-6 text-center order-2 order-lg-1">
                    <img src="../assets/img/ro.png" class="rounded img-fluid d-block mx-auto" alt="..." />
                </div>
                
                <!-- Kolom Form -->
                <div class="col-lg-6 m-auto p-5 order-1 order-lg-2 vh-100  align-items-center d-flex justify-content-center">
                    <form action="./store.php" method="POST" class="w-75 ">
                        <div class="border-success rounded-3 shadow p-5 pb-5 m-auto bg-light">
                            <h4 class="mb-3 text-center fw-bold text-success">Daftar Akun</h4>
                            
                            <div class="needs-validation" novalidate>
                                <div class="row g-3">
                                    <!-- Nama -->
                                    <div class="col-sm-6">
                                        <label for="firstName" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="firstName" name="nama" required>
                                        <div class="invalid-feedback">
                                            Nama diperlukan.
                                        </div>
                                    </div>
                                    
                                    <!-- Password -->
                                    <div class="col-sm-6">
                                        <label for="lastName" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="lastName" name="password" required>
                                        <div class="invalid-feedback">
                                            Password diperlukan.
                                        </div>
                                    </div>
                                    
                                    <!-- Username -->
                                    <div class="col-12">
                                        <label for="username" class="form-label">Username</label>
                                        <div class="input-group has-validation">
                                            <span class="input-group-text">@</span>
                                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                                            <div class="invalid-feedback">
                                                Username diperlukan.
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Tombol Simpan dan Bersihkan -->
                                <div class="d-flex flex-column mt-5 align-items-center">
                                    <button class="btn btn-success btn-lg mb-2 w-75 rounded-4 mb-4" type="submit" name="proses">Simpan Data</button>
                                    <p class=" mb-1">Sudah punya akun !</p>
                                    <a href="../login.php" class="text-danger ">Login Disini</a>
                                    <!-- <button class="btn btn-danger btn-lg w-75" type="reset">Hapus Data</button> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </main>

    <footer>
      <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
