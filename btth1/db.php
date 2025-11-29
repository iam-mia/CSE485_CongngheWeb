<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "btth1";

$conn = new mysqli($host, $user, $pass, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>
