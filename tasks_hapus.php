<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tasks WHERE taks_id=$id");
?>
<script>
    alert('Hapus data berhasil!!');
    location.href = "index.php?page=tasks";
</script>