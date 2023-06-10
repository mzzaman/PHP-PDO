<?php
try
{
	$serverName = "127.0.0.1";
	$dbName = "todos";
	$userName = "root";
	$password = "";

	$dsn = "mysql:host=$serverName; dbname=$dbName; charset=UTF8";
	$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
	$conn= new PDO($dsn, $userName, $password, $options);
	
}catch(PDOException $exception){
	die($exception->getMessage());
}