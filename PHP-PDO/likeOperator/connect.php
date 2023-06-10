<?php
require_once "config.php";


function connectDB($host,$db, $user, $password){
	try{
		$dsn = "mysql:host=$host; dbname=$db; charset=UTF8";
		$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
		return new PDO($dsn, $user, $password, $options);
	}catch(PDOException $exception){
		die($exception->getMessage());
	}
}
return connectDB($serverName, $dbName, $userName, $password);