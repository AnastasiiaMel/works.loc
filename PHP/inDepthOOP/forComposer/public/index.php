<?php
if( !session_id() ) {
    session_start();
}
require "../../vendor/autoload.php";


use Illuminate\Support\Arr;

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/PHP/inDepthOOP/forComposer/home', ['App\controllers\HomeController', 'index']);
    $r->addRoute('GET', '/PHP/inDepthOOP/forComposer/about', ['App\controllers\HomeController', 'about']);
    $r->addRoute('GET', '/PHP/inDepthOOP/forComposer/verification', ['App\controllers\HomeController', 'email_verification']);
    $r->addRoute('GET', '/PHP/inDepthOOP/forComposer/login', ['App\controllers\HomeController', 'login']);
    // {id} must be a number (\d+)
    //$r->addRoute('GET', '/PHP/inDepthOOP/forComposer/user/{id:\d+}', ['App\controllers\HomeController', 'index']);
    //$r->addRoute('GET', '/PHP/inDepthOOP/forComposer/users/{id:\d+}/company/classes/school/{number:\d+}', ['App\controllers\HomeController', 'about']);
    // The /{title} suffix is optional
    //$r->addRoute('GET', '/PHP/inDepthOOP/forComposer/articles/{id:\d+}[/{title}]', 'get_article_handler');
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
        $controller = new $handler[0];

        call_user_func([$controller, $handler[1]], $vars);
        break;
}

$array = [
   [ "marlin" => ["course" => "HTML"]],
    ["marlin" => ["course" => "PHP"]]
];
$result = Arr::pluck($array, 'marlin.course');
//var_dump($result);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$mail = new PHPMailer(true);

$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host = 'smtp.mail.ru';                     //Set the SMTP server to send through
$mail->SMTPAuth = true;                                   //Enable SMTP authentication
$mail->Username = '';                     //SMTP username
$mail->Password = '';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port = 465;

$mail->CharSet = "utf-8";
$mail->addAddress('sanzon2009@yandex.ru', 'Rahim');
$mail->setFrom('himera905@bk.ru', 'Mailer');
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Офигенская тема!';
$mail->Body    = 'Привет! Как дела?';
$mail->send();

var_dump($mail);




//use App\QueryBuilder;

//$db = new QueryBuilder();
//d($db);










// Create new Plates instance
//$templates = new League\Plates\Engine('../app/views');


// Render a template
//echo $templates->render('about', ['title' => 'Jonathan']);





//if ($_SERVER['REQUEST_URI']=='/PHP/inDepthOOP/forComposer/home'){

  //  require '../app/controllers/HomeController.php';
//}

//exit;




















//use Aura\SqlQuery\QueryFactory;

//

//var_dump($result);
//echo 123;