<?php
require_once "config.php";
function connect($host, $db, $user, $password)
{
    $dsn = "mysql:host=$host; dbname=$db; charset=UTF8";
    try {
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        return new PDO($dsn, $user, $password, $options);
    } catch (PDOException $exception) {
        die($exception->getMessage());

    }
}
return connect($serverName, $dbName, $userName, $password);
