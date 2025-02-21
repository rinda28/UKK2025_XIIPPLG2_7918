<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM tasks WHERE id=$id");
?>
<script>
    alert('Hapus Data Berhasil.');
    location.href = "index.php?page=tasks";
</script>