<?php
require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);


$sql = 'DELETE FROM students WHERE id = ?;';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, 2, PDO::PARAM_INT);
var_dump($statement->execute());
$statement->bindValue(1, 3, PDO::PARAM_INT);
var_dump($statement->execute());
$statement->bindValue(1, 4, PDO::PARAM_INT);
var_dump($statement->execute());
$statement->bindValue(1, 5, PDO::PARAM_INT);
var_dump($statement->execute());