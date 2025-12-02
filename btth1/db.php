<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "btth1";

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    die("Kết nối thất bại" . $e->getMessage());
}
