<?php
$host = 'localhost';
$dbname = 'ukk2025_xiipplg2_7918';
$username = 'root'; 
$password = ''; 

try {
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, $options);
    return $pdo;
} catch(PDOException $e) {
   
    error_log("Database connection failed: " . $e->getMessage(), 0);

   
    die("sistem sedang sibuk!! coba lagi nanti.");
}
?>