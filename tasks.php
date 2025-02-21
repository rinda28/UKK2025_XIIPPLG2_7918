<div class="container-fluid px-4">
    <h1 class="mt-4">Tugas</h1>

    <a href="?page=tasks_tambah" class="btn btn-outline-primary"><i class="fa fa-plus"></i>  Tambah Tugas</a>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Tugas</th>
            <th>Kategori</th>
            <th>Prioritas</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM tasks");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $data['due_date']; ?></td>
                <td><?php echo $data['tasks']; ?></td>
                <td><?php echo $data['category_id']; ?></td>
                <td><?php echo $data['priority']; ?></td>
                <td>
                    <?php
                    if ($data['status'] ==  "1") {
                        echo '<span class="badge bg-success">Complete</span>';
                    } else {
                        echo '<span class="badge bg-danger">Not Complete</span>';
                    }
                    ?>
                </td>

                <td>
                    <?php if ($data['status'] == 0) { ?>
                    <a href="?page=tasks_selesai&id=<?php echo $data['id']; ?>" class="btn btn-outline-success"><i class="fa fa-check-circle"></i>  Selesai</a>
                    <?php } ?>
                    <a href="?page=tasks_ubah&id=<?php echo $data['id']; ?>" class="btn btn-outline-secondary">Ubah</a>
                    <a href="?page=tasks_hapus&id=<?php echo $data['id']; ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i>  Hapus</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>