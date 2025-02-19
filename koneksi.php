<?php
if(session_status()== PHP_SESSION_NONE) {
    session_start();
}

$koneksi = mysqli_connect('localhost', 'root', '', 'ukk2025_xiipplg2_7918');

if(!$koneksi){ 
    die("koneksi database gagal: " .mysqli_connect_error());
}
?>