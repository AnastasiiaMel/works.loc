<?php
session_start();
$record = $_POST['record'];
$pdo = new PDO('mysql:host=localhost;dbname=task_10', 'root', '');

$sql = "SELECT * FROM `records` where record=:record";
$statement = $pdo -> prepare($sql);
$statement->execute(['record'=> $record]);
$result = $statement ->fetch(PDO::FETCH_ASSOC);
if (!empty($result)){
    $message = "Такая запись уже существует!";
    $_SESSION['danger']=$message;
    header("Location:/PHP/tasks20/task_11.php");
    exit;
}

$sql = "INSERT INTO `records` (`id`, `record`) VALUES (NULL, :record);";
$statement = $pdo->prepare($sql);
$statement->execute(['record'=> $record]);
$message = "Готово!";
$_SESSION['success']=$message;


header("Location:/PHP/tasks20/task_11.php");
