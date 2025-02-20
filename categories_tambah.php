<?php
include "koneksi.php"; 


if (!isset($_SESSION['users'])) {
    header('location:login.php');    
 exit();
}
?>

<h1 class="mt-4">Kategori Tugas</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                    if (isset($_POST['submit'])) {
                        $categories = mysqli_real_escape_string($koneksi, $_POST['categories']);
                        $user_id = $_SESSION['users']['id']; 

                        
                        $query = mysqli_query($koneksi, "INSERT INTO categories (categories, user_id) VALUES ('$categories', '$user_id')");

                        if ($query) {
                            echo '<script>alert("Tambah data berhasil.");</script>';
                            echo '<script>window.location.href = "?page=categories";</script>';
                        } else {
                            echo '<script>alert("Tambah data gagal: ' . mysqli_error($koneksi) . '");</script>';
                        }
                    }
                    ?>  
                    <div class="row mb-3">
                        <div class="col-md-2">Nama Kategori</div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="categories" required>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['users']['id']; ?>">
                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-outline-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            <a href="?page=categories" class="btn btn-outline-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>