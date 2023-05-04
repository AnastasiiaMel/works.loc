<?php
include 'functions.php';
include 'database/query_builder.php';

$pdo = connect_to_db();

$db = new query_builder();
$posts = $db->getAll($pdo);



//$posts = getAllPosts($pdo);


include 'index.view.php';
?>
