<?php
function dd($data){
    echo '<pre>';
    var_dump($data);
    echo '<pre>';
    die;
}

function getAllPosts()
{
    $pdo = new PDO('mysql:host=localhost;dbname=app3;charset=utf8', 'root', '');
    $sql = 'SELECT * FROM posts';
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $posts;
}