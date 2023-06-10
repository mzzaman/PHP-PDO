<?php
$pdo = require_once "connect.php";


/**
* Return an array of books with the book id in the $list
*/

function get_book_list(\PDO $pdo, array $list):array
{
	$placeHolder = str_repeat("?,", count($list) - 1) . "?";
	$sql = "SELECT book_id, title 
			FROM books
			WHERE book_id in ($placeHolder)";
	$statement = $pdo->prepare($sql);
	$statement->execute($list);

	return $statement->fetchAll(PDO::FETCH_ASSOC);

}

$books = get_book_list($pdo, ['1', '2', '3']);
print_r($books);