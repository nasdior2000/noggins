<?php
// config.php
session_start();

$host = 'localhost';
$dbname = 'little_fashion';
$username = 'root';
$password = '';



try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Password hashing options
define('PASSWORD_OPTIONS', [
    'cost' => 12,
]);

// Initialize cart if not exists
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


?>