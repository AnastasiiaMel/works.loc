<?php
if( !session_id() ) {
    session_start();
}
require "../../vendor/autoload.php";
use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();
$container = $containerBuilder->build();


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
        $container->call($routeInfo[1], $routeInfo[2]);


       // $controller =new PagesController($engine, $pdo,);

        break;
}

$array = [
   [ "marlin" => ["course" => "HTML"]],
    ["marlin" => ["course" => "PHP"]]
];
$result = Arr::pluck($array, 'marlin.course');
//var_dump($result);
/*lesson 20 Email
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
*/

?>

<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</html>
<body>
<?php
require "../../vendor/autoload.php";

use Aura\SqlQuery\QueryFactory;

$faker = Faker\Factory::create();

$pdo = new PDO('mysql:host=localhost; dbname=example01', 'root', '');
$queryFactory = new QueryFactory('mysql');

/*$insert = $queryFactory->newInsert();

$insert->into('posts');
for ($i=0; $i<30; $i++){
    $insert->cols([
        'title' => $faker->words(3, true),
        'content' => $faker->text
    ]);
    $insert->addRow();
}

$sth = $pdo ->prepare($insert->getStatement());
$sth->execute($insert->getBindValues());

$result = $sth->fetch(PDO::FETCH_ASSOC);
var_dump($result);die();*/

$select = $queryFactory->newSelect();
$select
    ->cols(['*'])
    ->from('posts');

$sth = $pdo->prepare($select->getStatement());

$sth->execute($select->getBindValues());
$totalIteams = $sth->fetchAll(PDO::FETCH_ASSOC);

$select = $queryFactory->newSelect();
$select
    ->cols(['*'])
    ->from('posts')
    ->setPaging(3)
    ->page($_GET['page'] ?? 1);
$sth = $pdo->prepare($select->getStatement());
$sth->execute($select->getBindValues());

$items = $sth->fetchAll(PDO::FETCH_ASSOC);

$itemsPerPage = 3;
$currentPage = $_GET['page'] ?? 1;
$urlPattern = '?page=(:num)';

$paginator = new \JasonGrimes\Paginator(count($totalIteams), $itemsPerPage, $currentPage, $urlPattern);
foreach ($items as $item){
    echo $item['id'] . PHP_EOL . $item['title'] . '<br>';
}
?>

<ul class="pagination">
    <?php if ($paginator->getPrevUrl()):  ?>
        <li><a href="<?php echo $paginator->getPrevUrl(); ?>">&laquo; Предыдущая</> </li>
    <?php endif; ?>

    <?php foreach ($paginator->getPages() as $page):  ?>
        <?php if ($page['url']):  ?>
            <li <?php echo $page['isCurrent'] ? 'class="active"' : ''; ?>>
                <a href="<?php echo $page['url'];?>"><?php echo $page['num']; ?></a>
            </li>
        <?php else: ?>
            <li class="disabled"><span><?php echo $page['num']; ?></span></li>
        <?php endif; ?>
        <?php endforeach; ?>

        <?php if($paginator->getNextUrl()): ?>
            <li><a href="<?php echo $paginator->getNextUrl(); ?>">Следующая &raquo;</a> </li>
        <?php endif; ?>
</ul>

<p>
    <?php echo $paginator->getTotalItems();?> Найдено.

    Выводим
    <?php echo $paginator->getCurrentPageFirstItem(); ?>
    -
    <?php echo $paginator->getCurrentPageLastItem() ?>
</p>
</body>
</html>





<?php

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