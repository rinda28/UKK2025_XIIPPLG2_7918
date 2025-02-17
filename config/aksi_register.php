<?php
include'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$namalengkap = $_POST['namalengkap'];


$sql = mysqli_query($koneksi, "INSERT INTO users VALUES('','$username','$password','$email','$namalengkap')");
if($sql) {
    echo "<script>
    alert('Pendaftaran akun berhasil');
    location.href='../login.php';
    </script>";
}
?>
