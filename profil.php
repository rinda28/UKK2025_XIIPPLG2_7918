<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['users'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['users'];
?>

<!DOCTYPE html>
<html lang="id" style="background-color: #D17D98;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        .profile-container { width: 50%; margin: auto; border: 1px solid #ccc; padding: 20px; border-radius: 10px; }
        img { border-radius: 50%; width: 150px; height: 150px; }
    </style>
</head>
<body>
    <div class="profile-container" style="background-color:rgb(241, 168, 191);">
        <h2>Profil Pengguna</h2>
        <p><strong>Username:</strong> <?php echo $user['username']; ?></p>
        <p><strong>Nama:</strong> <?php echo $user['nama']; ?></p>
        <p><strong>Password:</strong> <?php echo $user['password']; ?></p>
        <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    </div>
</body>
</html>
