<?php
$serverName = "127.0.0.1";
$dbName = "students";
$userName = "root";
$password = "";

try {
    $dsn = "mysql:host=$serverName; dbname=$dbName; charset=utf8";
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $conn = new PDO($dsn, $userName, $password, $options);
} catch (PDOException $exception) {
    die("Connection failed: " . $exception->getMessage());
}
