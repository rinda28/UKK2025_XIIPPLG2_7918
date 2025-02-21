<h1 class="mt-4">Laporan Tugas</h1>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <a href="cetak.php" target="_blank" class="btn btn-outline-primary"><i class="fa fa-print"></i>  Cetak Data</a>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Tugas</th>
                        <th>Kategori</th>
                        <th>Prioritas</th>
                        <th>Status</th>
                    </tr>
                    <?php
                    $i = 1;
                        $query = mysqli_query($koneksi, "SELECT*FROM tasks LEFT JOIN users on users.id = tasks.id");
                        while($data = mysqli_fetch_array($query)){
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['due_date']; ?></td>
                                <td><?php echo $data['tasks']; ?></td>
                                <td><?php echo $data['category_id']; ?></td>
                                <td><?php echo $data['priority']; ?></td>
                                <td><?php echo $data['status']; ?></td>
                            </tr>
                            <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>