<?php
session_start();
$click=$_POST['click'];


if (isset($_POST['reset'])){
    unset($_SESSION['click']);
}
elseif(isset($_SESSION['click'])){
    echo 'ok';
    $i = $_SESSION['click'];
    $i++;
}
else {
    $i = 0;
    $i++;
}
$_SESSION['click']=$i;

header("Location:/PHP/tasks20/task_14.php");