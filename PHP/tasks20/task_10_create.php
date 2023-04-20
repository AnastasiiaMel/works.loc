<?php
$pdo = new PDO('mysql:host=localhost;dbname=task_10', 'root', '');
$sql = "INSERT INTO `records` (`id`, `record`) VALUES (NULL, :record);";
$statement = $pdo->prepare($sql);
$statement->execute($_POST);


header("Location:/PHP/tasks20/task_10.php");
