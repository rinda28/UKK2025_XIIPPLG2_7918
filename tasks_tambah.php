<h1 class="mt-4">Tugas</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <form method="post">
                    <?php
                        if(isset($_POST['submit'])) {
                            $category_id = $_POST['category_id'];
                            $task = $_POST['task_id'];
                            $query = mysqli_query($koneksi, "INSERT INTO tasks(category_id, task_id) VALUES ('$category_id', '$task_id')");

                            if($query) {
                                echo '<script>alert("Tambah data berhasil.");</script>';
                                echo '<script>window.location.href = "?page=tasks";</script>';
                            }else{
                                echo '<script>alert("Tambah data gagal.");</script>';
                            }
                        }
                    ?>  

                    <div class="row mb-3">
                        <div class="col-md-2">Kategori</div>
                        <div class="col-md-8 mb-3">
                            <select name="category_id" class="form-control">
                                <?php
                                $cat = mysqli_query($koneksi, "SELECT * FROM categories");
                                while ($categories = mysqli_fetch_array($cat)) {
                                    ?>
                                    <option value="<?php echo $categories['category_id']; ?>"><?php echo $categories['categories']; ?></option>
                                    <?php
                                }
                                ?>
                        </select>
                    </div>
                </div>
                    <div class="row mb-3">
                        <div class="col-md-2">Tugas</div>
                        <div class="col-md-8"><input type="text" class="form-control" name="task"></div>
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
                            <input type="date" class="form-control" name="due_date">
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