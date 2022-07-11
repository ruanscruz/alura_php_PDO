<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$student1 = new Student(
  null, 
  "Carlo Alberto", 
  new \DateTimeImmutable('1997-10-15')
);

$student2 = new Student(
  null, 
  "Ruan Cruz", 
  new \DateTimeImmutable('1990-06-03')
);

$sqlInsert1 = "INSERT INTO students (name, birth_date) VALUES (?, ?)";
$statement1 = $pdo->prepare($sqlInsert1);
$statement1->bindValue(1, $student1->name());
$statement1->bindValue(2, $student1->birthDate()->format('Y-m-d'));


$sqlInsert2 = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date)";
$statement2 = $pdo->prepare($sqlInsert2);
$statement2->bindValue(1, $student2->name());
$statement2->bindValue(2, $student2->birthDate()->format('Y-m-d'));


if($statement1->execute() && $statement2->execute()){
  echo "Aluno incluído!" .PHP_EOL;
}