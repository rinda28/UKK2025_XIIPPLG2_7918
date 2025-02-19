<h1 class="mt-4">My To Do List</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Welcome My To Do List!</li>
</ol>

<div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card text-white mb-4" style="background-color:rgb(130, 60, 187);">
                <div class="card-body">
                <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM categories"));
                ?>
                Total Kategori</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=categories">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card text-white mb-4" style="background-color: rgb(130, 60, 187);">
                <div class="card-body">
                <?php
                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM tasks"));
                ?>
                Total tugas</div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a class="small text-white stretched-link" href="?page=tasks">View Details</a>
                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                </div>
            </div>
        </div>
</div>

<div class="card col-md-6" style="background-color:rgb(65, 59, 75);">
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <td width="200">Nama</td>
                <td width="1">:</td>
                <td><?php echo $_SESSION['users']['nama']; ?></td>
            </tr>
            <tr>
                <td width="100">Tanggal Login</td>
                <td width="1">:</td>
                <td><?php echo date('d-m-Y'); ?></td>
            </tr>
        </table>
    </div>
</div>