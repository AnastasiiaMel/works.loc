<?php
include '../functions.php';
//include '../index.view.php';


$routes = [
    '/PHP/mindOOP/' => '../functions/homepage.php',
    '/PHP/mindOOP/about' => '../functions/about.php',
    '/PHP/mindOOP/posts/5' => '../functions/post.php'
];

$route = $_SERVER['REQUEST_URI'];

if (array_key_exists($route, $routes)){
    include$routes[$route]; exit;
} else{
    dd(404);
}






