<?php
$pdo = require_once "connect.php";

/**
* Find books by title based on a pattern
*/
function find_book_by_title(\PDO $pdo, string $keyword):array
{
	$pettern = '%' . $keyword . '%' ;
	$sql = 'SELECT book_id, title 
	FROM books 
	WHERE title LIKE :pettern';
	$statement = $pdo->prepare($sql);
	$statement->execute([
		':pettern' => $pettern,
	]);
	return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// find books with the title matches 'es'
$books = find_book_by_title($pdo, 'es');
foreach ($books as $book) {
	echo $book['title'];
}