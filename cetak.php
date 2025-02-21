<h2 align="center">Laporan Tugas</h2>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Tugas</th>
            <th>Kategori</th>
            <th>Prioritas</th>
            <th>Status</th>
    </tr>
    <?php
    include "koneksi.php";
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
    <script>
        window.print();
        setTimeout(function() {
            window.close();
        }, 100);
    </script>