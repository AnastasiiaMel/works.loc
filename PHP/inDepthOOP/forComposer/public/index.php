<?php

require "../../vendor/autoload.php";

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/PHP/inDepthOOP/forComposer/users', 'get_all_users_handler');
    // {id} must be a number (\d+)
    $r->addRoute('GET', '/PHP/inDepthOOP/forComposer/user/{id:\d+}', 'get_user_handler');
    // The /{title} suffix is optional
    $r->addRoute('GET', '/PHP/inDepthOOP/forComposer/articles/{id:\d+}[/{title}]', 'get_article_handler');
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];


// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];

        $vars = $routeInfo[2];
        call_user_func($handler, $vars);
        break;
}

function get_user_handler($vars){
    d($vars['id']);
}









//use App\QueryBuilder;

//$db = new QueryBuilder();
//d($db);










// Create new Plates instance
//$templates = new League\Plates\Engine('../app/views');


// Render a template
//echo $templates->render('about', ['title' => 'Jonathan']);





//if ($_SERVER['REQUEST_URI']=='/PHP/inDepthOOP/forComposer/home'){

  //  require '../app/controllers/homepage.php';
//}

//exit;




















//use Aura\SqlQuery\QueryFactory;

//

//var_dump($result);
//echo 123;