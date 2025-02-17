<?php
session_start();
$userid = $_SESSION['userid'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
    echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY TODO LIST</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="index.php">Website Galeri Foto</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
        <a href="home.php" class="nav-link">Home</a>
        <a href="album.php" class="nav-link">Album</a>
        <a href="foto.php" class="nav-link">Foto</a>
      </div>
      <a href="../config/aksi_logout.php" class="btn btn-outline-primary m-1">Keluar</a>
    </div>
  </div>
</nav>

<div class="container mt-2">
    <div class="row">
    <?php 
    $query = mysqli_query($koneksi, "SELECT * FROM foto");
    while ($data = mysqli_fetch_array($query)) {
    ?>
        <div class="col-md-3 mt-2">
            <a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['fotoid']; ?>">
                <div class="card">
                    <img src="../assets/img/<?php echo $data['lokasifile']; ?>" class="card-img-top" title="<?php echo $data['judulfoto']; ?>" style="height: 12rem;">
                    <div class="card-footer text-center">
                        <?php 
                        $fotoid = $data['fotoid'];
                        $ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid' AND userid='$userid'");
                        if (mysqli_num_rows($ceksuka) == 1) { ?>
                            <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid']; ?>" type="submit"><i class="fa fa-heart"></i></a>
                        <?php } else { ?>
                            <a href="../config/proses_like.php?fotoid=<?php echo $data['fotoid']; ?>" type="submit"><i class="fa-regular fa-heart"></i></a>
                        <?php }
                        $like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE fotoid='$fotoid'");
                        echo mysqli_num_rows($like) . ' Suka';
                        ?>

                        <?php 
                        $jmlKomentar = mysqli_query($koneksi, "SELECT * FROM komentar WHERE fotoid='$fotoid'");
                        echo '<a href="#"><i class="fa-regular fa-comment"></i> ' . mysqli_num_rows($jmlKomentar) . ' Komentar</a>';
                        ?>
                    </div>
                </div>
            </a>

           
            <div class="modal fade" id="komentar<?php echo $data['fotoid']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Detail Foto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <img src="../assets/img/<?php echo $data['lokasifile']; ?>" class="card-img-top" title="<?php echo $data['judulfoto']; ?>">
                                </div>
                                <div class="col-md-4">
                                    <div class="m-2">
                                        <strong><?php echo $data['judulfoto']; ?></strong><br>
                                        <span class="badge bg-secondary">User: <?php echo $data['userid']; ?></span>
                                        <span class="badge bg-secondary">Tanggal: <?php echo $data['tanggalunggah']; ?></span>
                                        <span class="badge bg-primary">Album: <?php echo $data['albumid']; ?></span>
                                        <hr>
                                        <p><?php echo $data['deskripsifoto']; ?></p>
                                        <hr>
                                        <h5>Komentar</h5>
                                        <?php
                                        $fotoid = $data['fotoid'];
                                        $komentar = mysqli_query($koneksi, "SELECT komentar.*, user.username FROM komentar 
                                            JOIN user ON komentar.userid = user.userid WHERE komentar.fotoid='$fotoid'");
                                        while($row = mysqli_fetch_array($komentar)){
                                        ?>
                                        <p align="left">
                                          <strong><?php echo $row['username']; ?></strong>: 
                                          <?php echo $row['isikomentar']; ?>
                                        </p>
                                        <?php } ?>
                                        <hr>
                                        <form action="../config/proses_komentar.php" method="POST">
                                            <div class="input-group">
                                                <input type="hidden" name="fotoid" value="<?php echo $data['fotoid']; ?>">
                                                <input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
                                                <button type="submit" name="kirimkomentar" class="btn btn-outline-primary">Kirim</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>

<footer class="d-flex justify-content-center border-top mt-3 bg-light fixed-bottom">
    <p>&copy; UKK PPLG 2024 | Rinda Mahadewi</p>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
</body>
</html>
