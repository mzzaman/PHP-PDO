<?php
require_once "config.php";

// Make ensure Connection to BD;
function connectToBD($host, $db, $user, $password)
{
	try{
		$dsn = "mysql:host=$host; dbname=$db; charset=UTF8";
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		return new PDO($dsn, $user, $password, $options);
	}catch(PDOException $exception){
		die($exception->getMessage());
	}
}
return connectToBD($serverName, $dbName, $userName, $password);