<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$pdo = new PDO('mysql:host=localhost;dbname=tasks_15', 'root', '');
$sql = "SELECT * FROM `users` WHERE password=:password and email=:email ";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email, 'password'=>$password]);
$result = $statement->fetch(PDO::FETCH_ASSOC);
if($result==false){
    $message = 'Неверный логин или пароль';
    $_SESSION['mistake']=$message;
}
else{
    $message = 'Все правильно!';
    $_SESSION['right']=$message;
}
header("Location:/PHP/tasks20/task_15.php");