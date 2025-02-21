<h1 class="mt-4">Tugas</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                <?php
                        $id = $_GET['id'];
                        if(isset($_POST['submit'])) {
                            $category_id = mysqli_real_escape_string($koneksi, $_POST['category_id']);
                            $tasks = mysqli_real_escape_string($koneksi, $_POST['tasks']);
                            $priority = mysqli_real_escape_string($koneksi, $_POST['priority']);
                            $due_date = mysqli_real_escape_string($koneksi, $_POST['due_date']);
                            $user_id = $_SESSION['users']['id'];
                            $status = mysqli_real_escape_string($koneksi, $_POST['status']);

                            $query = mysqli_query($koneksi, "UPDATE tasks set category_id='$category_id', tasks='$tasks', priority='$priority', due_date='$due_date', user_id='$user_id', status='$status' WHERE id=$id");

                            if($query) {
                                echo '<script>alert("Ubah data berhasil.");</script>';
                                echo '<script>window.location.href = "?page=tasks";</script>';
                            } else {
                                echo '<script>alert("Ubah data gagal: ' . mysqli_error($koneksi) . '");</script>';
                            }
                        }
                        $query = mysqli_query($koneksi, "SELECT*FROM tasks WHERE id=$id");
                        $data = mysqli_fetch_array($query);
                    ?>  
                    <div class="row mb-3">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-8 mb-3">
                            <select name="category_id" class="form-control">
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
                        <div class="col-md-2">Tugas</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="tasks"></div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Prioritas</div>
                        <div class="col-md-8 mb-3">
                            <select name="priority" class="form-control">
                                <option value="wajib">Wajib</option>
                                <option value="tidak wajib">Tidak wajib</option>
                                <option value="bebas">Bebas</option>
                            </select>
                    </div>
                </div>
                <div class="row mb-3">
                        <div class="col-md-2">Tanggal Riwayat</div>
                        <div class="col-md-8">
                            <input type="date" class="form-control" name="due_date">
                        </div>
                    </div> 
                    <div class="row mb-3">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <button type="submit" class="btn btn-outline-primary" name="submit" value="submit">Simpan</button>
                            <a href="?page=tasks" class="btn btn-outline-danger">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>