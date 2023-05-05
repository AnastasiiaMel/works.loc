<?php

include 'functions.php';
$db = include 'database/start.php';

$db->update('posts', [
    'title' => $_POST['title'],
], $_GET['id']);

header('Location: index.php');