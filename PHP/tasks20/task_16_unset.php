<?php
session_start();
$unset = $_GET['unset'];
if ($unset==1 ){
    unset($_SESSION['unset']);
    $message = 'Вы не вошли в систему';
    $_SESSION['unset'] = $message;

}

header("Location:/PHP/tasks20/task_16.php");