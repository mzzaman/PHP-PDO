<?php
$pdo = require_once "connect.php";
//insert a single publisher;
// $name = "Moniruzzaman";
// $sql = 'INSERT INTO publishers (name) VALUES(:name)';
// $statement = $pdo->prepare($sql);
// $statement->execute([
//     ':name' => $name,
// ]);
// $publisher_id = $pdo->lastInsertId();
// echo "The Publisher id " . $publisher_id . " was Inserted";

//TODO: Insert multiple rows into a table example;

$names = [
    'Penguin/Random House',
    'Hachette Book Group',
    'Harper Collins',
    'Simon and Schuster',
];

$sql = 'INSERT INTO publishers(name) VALUES(:name)';
$statement = $pdo->prepare($sql);

foreach ($names as $name) {
    $statement->execute([
        ':name' => $name,
    ]);
}
$publisher_id = $pdo->lastInsertId();
echo "The Publisher Id " . $publisher_id . " was inserted";
