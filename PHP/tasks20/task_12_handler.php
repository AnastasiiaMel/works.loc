<?php

session_start();
$email = $_POST['email'];
$pdo = new PDO('mysql:host=localhost;dbname=task_12', 'root', '');

$sql = "SELECT * FROM `users` where email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$result = $statement->fetch(PDO::FETCH_ASSOC);
if (!empty($result)) {
    $message = "Этот эл адрес уже занят другим пользователем";
    $_SESSION['danger'] = $message;
    header("Location:/PHP/tasks20/task_12.php");
    exit;
}

$sql = "INSERT INTO `users` (`id`, `email`, `password`) VALUES (NULL, :email, :password);";
$statement = $pdo->prepare($sql);
$statement->execute($_POST);
$message = "Готово!";
$_SESSION['success'] = $message;


header("Location:/PHP/tasks20/task_12.php");
