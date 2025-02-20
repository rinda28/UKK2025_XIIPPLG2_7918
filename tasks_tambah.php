<?php
include "koneksi.php"; 

if (!isset($_SESSION['users'])) {
    header('location:login.php');    
    exit();
}
?>
<h1 class="mt-4">Tugas</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                        if(isset($_POST['submit'])) {
                            // Menggunakan 'category_id' sesuai dengan nama yang benar
                            $category_id = mysqli_real_escape_string($koneksi, $_POST['categories']); // Ubah 'category_id' menjadi 'categories'
                            $tasks = mysqli_real_escape_string($koneksi, $_POST['tasks']);
                            $priority = mysqli_real_escape_string($koneksi, $_POST['priority']);
                            $date = mysqli_real_escape_string($koneksi, $_POST['date']);
                            $user_id = $_SESSION['users']['id'];
                            $status = mysqli_real_escape_string($koneksi, $_POST['status']);

                            // Mengganti $due_date dengan $date
                            $query = mysqli_query($koneksi, "INSERT INTO tasks (category_id, tasks, priority, due_date, user_id, status) 
                                VALUES ('$category_id', '$tasks', '$priority', '$date', '$user_id', '$status')");

                            if($query) {
                                echo '<script>alert("Tambah data berhasil.");</script>';
                                echo '<script>window.location.href = "?page=tasks";</script>';
                            } else {
                                echo '<script>alert("Tambah data gagal: ' . mysqli_error($koneksi) . '");</script>';
                            }
                        }
                    ?>  
                    <div class="row mb-3">
                        <div class="col-md-2">Nama Kategori</div>
                        <div class="col-md-8 mb-3">
                            <select name="categories" class="form-control">
                                <?php
                                $cat = mysqli_query($koneksi, "SELECT * FROM categories");
                                while ($categories = mysqli_fetch_array($cat)) {
                                    ?>
                                    <option value="<?php echo $categories['id']; ?>"><?php echo $categories['categories']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Nama Tugas</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="tasks"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Prioritas</div>
                        <div class="col-md-8 mb-3">
                            <select name="priority" class="form-control">
                                <option value="tinggi">Tinggi</option>
                                <option value="sedang">Sedang</option>
                                <option value="rendah">Rendah</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tanggal Riwayat</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="date">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Status</div>
                        <div class="col-md-8">
                            <select name="status" class="form-control">
                                <option value="complete">Complete</option>
                                <option value="not complete">Not Complete</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['users']['id']; ?>">
                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-outline-primary" name="submit" value="submit">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary">Reset</button>
                            <a href="?page=tasks" class="btn btn-outline-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>