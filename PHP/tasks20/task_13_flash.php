<?php
session_start();
$text = $_POST['message'];

if (!empty($text)){
    $_SESSION['message']='Ваше сообщение выводится тут';

}


header("Location:/PHP/tasks20/task_13.php");



