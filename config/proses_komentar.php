<?php
session_start();
include 'koneksi.php';

if (!isset($_POST['isikomentar']) || empty($_POST['isikomentar'])) {
    echo "<script>alert('Komentar tidak boleh kosong!'); history.back();</script>";
    exit;
}

$fotoid = $_POST['fotoid'];
$userid = $_SESSION['userid'];
$isikomentar = $_POST['isikomentar'];
$tanggalkomentar = date("Y-m-d");

// Perbaiki tabel (pastikan tabel adalah 'komentar' bukan 'komentarfoto')
$query = mysqli_query($koneksi, "INSERT INTO komentar (fotoid, userid, isikomentar, tanggalkomentar) VALUES ('$fotoid', '$userid', '$isikomentar', '$tanggalkomentar')");

if (!$query) {
    die("Query Error: " . mysqli_error($koneksi));
} else {
    echo "<script>location.href='../admin/index.php';</script>";
}
?>
