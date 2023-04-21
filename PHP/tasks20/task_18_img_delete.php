<?php
$img_name = $_FILES['img']['name'];
$img_tmp_name = $_FILES['img']['tmp_name'];
$tmp_upload = 'upload_task17/';
$uniq_name = uniqid();
$extension = explode('.', $img_name);
$new_name = $uniq_name . '.' . $extension[array_key_last($extension)];
$new_tmp = $tmp_upload . $new_name;
move_uploaded_file($img_tmp_name, $new_tmp);


$pdo = new PDO('mysql:host=localhost;dbname=task_17_img', 'root', '');
$sql = "INSERT INTO `img` (`id`, `name`, `path`) VALUES (NULL, :name, :path);";
$statement = $pdo->prepare($sql);
$statement->execute(['name' => $img_name, 'path' => $new_name]);

$name = $_GET['name'];
$sql = "DELETE FROM `img` WHERE path=:name";
$statement = $pdo->prepare($sql);
$statement->execute(['name' => $name]);



header("Location:/PHP/tasks20/task_18.php");