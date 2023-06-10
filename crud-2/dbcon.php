<?php
$serverName = "127.0.0.1";
$userName = "root";
$password = "";
$dbName = "students";

try {
    $dsn = "mysql:host=$serverName; dbname=$dbName; charset=utf8";
    $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
    $conn = new PDO($dsn, $userName, $password, $options);
} catch (PDOException $exception) {
    $message = $exception->getMessage();
    die($message);
}
