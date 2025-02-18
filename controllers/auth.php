<?php
session_start();
$pdo = require_once '../config/koneksi.php';

if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

  
    if(strlen($_POST['password']) < 8) {
        header("Location: ../views/register.php?error=password_short");
        exit();
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    try {
       
        $check = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $check->execute([$username]);
        if($check->rowCount() > 0) {
            header("Location: ../views/register.php?error=username_taken");
            exit();
        }

        $stmt = $pdo->prepare("INSERT INTO users (name, username, email, password) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $username, $email, $password]);
        header("Location: ../index.php?msg=registered");
        exit();
    } catch(PDOException $e) {
        die("Registration failed: " . $e->getMessage());
    }
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['name'] = $user['name'];
            header("Location: ../index.php");
            exit();
        } else {
            header("Location: ../index.php?error=invalid");
            exit();
        }
    } catch(PDOException $e) {
        die("Login failed: " . $e->getMessage());
    }
}

if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../index.php");
    exit();
}
?>