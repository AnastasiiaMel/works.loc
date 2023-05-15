<?php
include '../functions.php';
//include '../index.view.php';


$routes = [
    '/PHP/inDepthOOP/blog/' => '../functions/homepage.php',
    '/PHP/inDepthOOP/blog/about' => '../functions/about.php',
    '/PHP/inDepthOOP/blog/posts/5' => '../functions/post.php'
];

$route = $_SERVER['REQUEST_URI'];

if (array_key_exists($route, $routes)){
    include$routes[$route]; exit;
} else{
    dd(404);
}






