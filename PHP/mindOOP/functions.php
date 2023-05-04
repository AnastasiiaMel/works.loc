<?php
function dd($data){
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
    die;
}

function connect_to_db(){
    $pdo = new PDO('mysql:host=localhost;dbname=app3;charset=utf8', 'root', '');
    return $pdo;
}

