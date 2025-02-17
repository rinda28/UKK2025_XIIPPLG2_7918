<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>MY TODO LIST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
  <div class="container">
    <a class="navbar-brand text-light" href="index.php">MY TODO LIST</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNav">
        <div class="navbar-nav me-auto">
        </div>
            <a href="register.php" class="btn btn-outline-primary bg-light m-1">Daftar</a>
            <a href="login.php" class="btn btn-outline-light btn-primary m-1">Masuk</a>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body bg-dark text-light">
                    <div class="text-center">
                        <h5>Login Website</h5>
                    </div>
                    <form action="config/aksi_login.php" method="POST">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    <div class="d-grid mt-2">
                        <button class="btn btn-success" type="submit" name="kirim">KIRIM</button>
                    </div>
                    </form>
                    <hr>
                    <p>Belum ada akun? <a href="register.php">Registrasi Disini</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bd-light fixed-bottom" >
    <p>&copy; UKK PPLG | Nama Peserta</p>
</footer>

    <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>